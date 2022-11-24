<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class UserController extends Controller
{
    public function  index()
    {
        $this->authorize('viewAny', User::class);
        $users =[];
        return view('admin.users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetUsers(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $search = $request->search;
        $status = $request->status;
        $filter = $request->filter;
        $created_at = json_decode($request->created_at);
        $order = $request->order;
        $dir = $request->dir;
        $users = User::with('role')->search($search)
            ->when($status != '', function ($query) use($status) { $query->where('status', $status);})
            ->when($filter, function ($query) use($filter) { $query->where($filter, '!=', null);})
            ->when($created_at, function($query, $created_at) { $query->whereBetween('created_at', $created_at); })
            ->when($order, function ($query, $order) use ($dir) { $query->orderBy($order, $dir); })
            ->withTrashed()->paginate(10);
        return UserResource::collection($users);
    }

    public function apiUserEdit(Request $request)
    {
        $user = User::withTrashed()->find($request->id);
        $this->authorize('view', $user);
        return new UserResource($user);
    }

    public function apiUserUpdate(Request $request)
    {
        $id = (int)$request->id;
        $validated = $request->validate([
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'phone' => 'required|size:12',
        ]);
        if($id) {
            $user = User::withTrashed()->find($id);
            $this->authorize('update', $user);
            $user->update($request->all());
//            TODO при создании пользователя отправить ему email со ссылкой на регистрацию
        }
        else {
            $this->authorize('create', User::class);
            $request->merge(['password' => Hash::make('11111111')]);
            $user = User::create($request->all());
        }

        return new UserResource($user);
    }

    public function apiUserDelete(Request $request)
    {
        $ids = $request->ids;
        $draftRemove = $request->draftRemove;
        if($draftRemove === "draft") {
            $this->authorize('restore', User::withTrashed()->first());
            User::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', User::first());
            User::destroy($ids);
        }

        return response()->json([ 'ids' => $ids ], 200);
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
        $this->authorize('view', $id);
        $user = User::findOrFail($id);
        return view('admin.apps-ecommerce-user-details', compact('user'));
    }


    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function apiExport()
    {
        return Excel::download(new UsersExport, 'users.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function apiImport(Request $request)
    {
        $this->authorize('create', User::class);
        $validated = $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt',
        ]);

        Excel::import(new UsersImport, $request->file,null, \Maatwebsite\Excel\Excel::XLSX);

        return response()->json('success');
    }
}
