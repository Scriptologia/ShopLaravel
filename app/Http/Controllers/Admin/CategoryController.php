<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\CategoryResource;
use App\Models\Permission;
use App\Models\Category;
use App\Services\Media\ImageService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    protected $folder = 'categories' ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);
        return view('admin.categories');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetCategories(Request $request)
    {
        $this->authorize('viewAny', Category::class);
        $search = $request->search;
        $filter = $request->filter;
        $created_at = json_decode($request->created_at);
        $order = $request->order;
        $dir = $request->dir;
        $categories = Category::withTrashed()->with('products')->search($search)
            ->when($filter, function ($query) use($filter) { $query->where($filter, '!=', null);})
            ->when($created_at, function($query, $created_at) { $query->whereBetween('created_at', $created_at); })
            ->when($order, function ($query, $order) use ($dir) {
                if(in_array($order, (new Category)->translatedAttributes)) {
                    $query->select('categories.*')->join('category_translations', 'category_translations.category_id', '=', 'categories.id')->where('locale', '=', App::getLocale())
                        ->orderBy('category_translations.name', $dir);//dd($query->first());
                }
                else {$query->orderBy($order, $dir); }
                })
            ->paginate(10);
        return CategoryResource::collection($categories);
    }

    public function apiCategoryEdit(Request $request)
    {
        $category = Category::withTrashed()->find($request->id);
        $this->authorize('view', $category);
        return new CategoryResource($category);
    }

    public function apiCategoryUpdate(Request $request, ImageService $service)
    {
        $id = (int)$request->id;
            $valid = [];
            foreach (config('translatable.languages') as $v) {
                $valid += [$v . '.name' => ['required', 'max:100', 'min:3', Rule::unique('category_translations', 'name')->ignore($id, 'category_id')] ];
                $valid += [$v . '.description' => 'max:2500'];
            }
            Validator::make($request->all(), $valid)->validate();

        $validated = $request->validate([
            'img' => ['image', 'mimes:jpeg,png,jpg,gif,svg', Rule::requiredIf(!$id)]
        ]);
        if($request->id) {
            $category = Category::withTrashed()->find($id);
            $this->authorize('update', $category);
            if(array_key_exists('img' , $request->all() )) {
                $img = $category->img;
                $service->deleteMedia($img);
            }
        }
        else {
            $this->authorize('create', Category::class);
            $category = new Category;
        }

        $category->fill($request->all());
        $category->slug = '';
        if(array_key_exists('img' , $request->all() )) {
              $img = $request->img;
              $path = $service->getUrl( $img, $this->folder, 194, 194);
              $category->img = $path;
        }

        $category->save();
        return new CategoryResource($category);
    }

    public function apiCategoryDelete(Request $request)
    {
        $ids = $request->ids;
        $draftRemove = $request->draftRemove;
        if($draftRemove === "draft") {
            $this->authorize('restore', Category::withTrashed()->first());
            Category::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', Category::class);
            Category::destroy($ids);
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
//    public function show($id)
//    {
//        $this->authorize('view', $if);
//        return view('admin.category');
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $categories = Category::withTrashed()->get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
