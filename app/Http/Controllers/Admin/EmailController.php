<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmailResource;
use App\Models\Category;
use App\Models\Email;
use App\Models\Tag;
use App\Services\Media\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmailsExport;
use App\Imports\EmailsImport;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.emails');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetEmails(Request $request)
    {
        $this->authorize('viewAny', Email::class);
        $search = $request->search;
        $filter = $request->filter;
        $order = $request->order;
        $dir = $request->dir;
        $emails = Email::with('user')->where(function($query) use ($filter) {
            if($filter) $query->where($filter, '!=', 0);
        })->search($search)->when($order, function ($query, $order) use ($dir) {
            if($order == 'verified') $order = 'email_verified_at' ;
            $query->orderBy($order, $dir);
        })->withTrashed()->paginate(10);
        return EmailResource::collection($emails);
    }

//    public function apiEmailEdit(Request $request)
//    {
//        $email = Email::withTrashed()->find($request->id);
//        $this->authorize('view', $email);
//        return new EmailResource($email);
//    }

//    public function apiEmailUpdate(Request $request, ImageService $service)
//    {
//        $images =[];
//        $id = (int)$request->id;
//        $validated = $request->validate([
//            'name' => [ 'max:100',Rule::unique('emails')->ignore($id)],
//            'description' => 'rmax:255',
//            'img_main' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=640,min_height=500',
//            'files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=640,min_height=500',
//        ]);
//        if($request->id) {
//            $email = Email::withTrashed()->find($id);
//            $this->authorize('update', $email);
//
//            if(array_key_exists('filesToRemove', $request->all() )) {
//                $filesToRemove = json_decode($request->all()['filesToRemove']);
//                $service->deleteMedia($filesToRemove);
//            }
//            $images =  array_diff($email->images, $filesToRemove);
//
//            if(array_key_exists('fileMain' , $request->all() )) {
//                $service->deleteMedia($email->img_main);
//            }
//        }
//        else {
//            $this->authorize('create', Email::class);
//            $email = new Email;
//        }
//
//        if(array_key_exists('newObj', $request->all() )) {
//            $newObj =(array) json_decode($request->newObj );
//            $tags = $newObj['tags'];
//            unset($newObj['tags']);
//            unset($newObj['rating']);
//            if($newObj['deleted_at']) {$email->deleted_at = now();}
//            else {$email->deleted_at = null;}
//            unset($newObj['deleted_at']);
//            $email->fill($newObj);
//        }
//
//        if(array_key_exists('fileMain' , $request->all() )) {
//            $fileMain = $request->fileMain;
//            if( $fileMain) {
//                $path = $service->getUrl( $fileMain, $this->folder, 640, 500);
//                $email->img_main = $path;
//            }
//        }
//
//        if(array_key_exists('files', $request->all() )) {
////            $files = $request->files;
//            $files = $request->all()['files'];
//            foreach($files as $key => $file) {
//                $path = $service->getUrl( $file, $this->folder, 640, 500);
////                $path = $this->storage->putFileAs('emails', $file, rand(0,999).'-'.date('h-i-s-d-m-Y') . '.' . $file->getClientOriginalExtension());
//                $pathFile[$key] = $path;
//            }
//            $email->images = array_merge($images, $pathFile);
//        }
//
//        $email->slug = '';
//
//        $email->save();
//        $email->tags()->sync(collect($tags)->pluck('id'));
//
//        $email->save();
//        return new EmailResource($email);
//    }

    public function apiEmailDelete(Request $request)
    {
        $ids = $request->ids;
        $draftRemove = $request->draftRemove;
        if($draftRemove === "draft") {
            $this->authorize('restore', Email::class);
            Email::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', Email::class);
            Email::destroy($ids);
        }

        return response()->json([ 'ids' => $ids ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::withTrashed()->get();
        $tags = Tag::withTrashed()->get();
        return view('admin.apps-ecommerce-add-email', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', $if);
        return view('admin.apps-ecommerce-email-details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $categories = Category::withTrashed()->get();
        $tags = Tag::withTrashed()->get();
        return view('admin.apps-ecommerce-add-email', compact('categories', 'tags'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function apiExport()
    {
        return Excel::download(new EmailsExport, 'emails.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function apiImport(Request $request)
    {
        $this->authorize('create', Email::class);
        $validated = $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt',
        ]);

        Excel::import(new EmailsImport, $request->file,null, \Maatwebsite\Excel\Excel::XLSX);

        return response()->json('success');
    }
}
