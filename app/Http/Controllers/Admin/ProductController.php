<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Services\Media\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    protected $folder = 'products' ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Product::class);
        $categories =Category::get();
        $maxPrice = Product::max('price') / 100;
        return view('admin.products', compact('categories', 'maxPrice'))
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetProducts(Request $request)
    {
        $this->authorize('viewAny', Product::class);
        $search = $request->search;
        $filter = $request->filter;
        $category_id = $request->category_id;
        $price = json_decode($request->price);
        $discount = $request->discount;
        $rating = $request->rating;
        $created_at = json_decode($request->created_at);
        $order = $request->order;
        $dir = $request->dir;
        $products = Product::withTrashed()->with('category')->search($search)
            ->when($filter, function ($query) use($filter) { $query->where($filter, '!=', null); })
            ->when($category_id, function ($query) use($category_id) { $query->where('category_id', $category_id); })
            ->when($price, function ($query) use($price) { $query->whereBetween('price', $price); })
            ->when(isset($discount), function ($query) use($discount) {$query->whereBetween('discount', [$discount, $discount + 1000]); })
            ->when(isset($rating), function ($query) use($rating) { $query->whereBetween('rating', [$rating, $rating + 2]); })
            ->when($created_at, function($query, $created_at) { $query->whereBetween('created_at', $created_at); })
            ->when($order, function ($query, $order) use ($dir) {
                if(in_array($order, (new Product)->translatedAttributes)) {
                    $query->select('products.*')->join('product_translations', 'product_translations.product_id', '=', 'products.id')->where('locale', '=', App::getLocale())
                        ->orderBy('product_translations.name', $dir);
                }
                else {$query->orderBy($order, $dir);}
            })
            ->withTrashed()->paginate(10);
        return ProductResource::collection($products);
    }

    public function apiProductEdit(Request $request)
    {
        $product = Product::withTrashed()->with('category')->find($request->id);
        $this->authorize('view', $product);
        return new ProductResource($product);
    }

    public function apiProductUpdate(Request $request, ImageService $service)
    {
        $images =[];
        $id = (int)$request->id;
        $validated = $request->validate([
            'img_main' => 'image|mimes:jpeg,png,jpg,gif|dimensions:min_width=640,min_height=500',
            'files.*' => 'image|mimes:jpeg,png,jpg,gif|dimensions:min_width=640,min_height=500',
        ]);
        if(array_key_exists('newObj', $request->all() )) {
            $valid = [];
            $newObj =(array) json_decode($request->newObj, true );
            foreach (config('translatable.languages') as $v) {
                $valid += [$v . '.name' => ['required', 'max:100', 'min:3', Rule::unique('product_translations', 'name')->ignore($id, 'product_id')] ];
                $valid += [$v . '.description' => 'required|max:2500'];
                $valid += [$v . '.description_seo' => 'required|max:500'];
                $valid += [$v . '.title_seo' => 'required|max:255'];
                $valid += [$v . '.keywords' => 'string'];
            }
            Validator::make($newObj, $valid)->validate();
        }
        if($request->id) {
            $product = Product::withTrashed()->find($id);
            $this->authorize('update', $product);

            if(array_key_exists('filesToRemove', $request->all() )) {
                $filesToRemove = json_decode($request->all()['filesToRemove']);
                $service->deleteMedia($filesToRemove);
            }
            $images =  array_diff($product->images, $filesToRemove);

            if(array_key_exists('fileMain' , $request->all() )) {
                $service->deleteMedia($product->img_main);
            }
        }
        else {
            $this->authorize('create', Product::class);
            $product = new Product;
        }

        if($newObj) {
            $tags = $newObj['tags'];
            if($newObj['deleted_at']) {$product->deleted_at = now();}
            else {$product->deleted_at = null;}
            $product->fill($newObj);
        }

        if(array_key_exists('fileMain' , $request->all() )) {
            $fileMain = $request->fileMain;
            if( $fileMain) {
                $path = $service->getUrl( $fileMain, $this->folder, 640, 500);
                $product->img_main = $path;
            }
        }

        if(array_key_exists('files', $request->all() )) {
            $files = $request->all()['files'];
            foreach($files as $key => $file) {
                $path = $service->getUrl( $file, $this->folder, 640, 500);
                $pathFile[$key] = $path;
            }
            $product->images = array_merge($images, $pathFile);
        }

        $product->slug = '';

        $product->save();
        $product->tags()->sync(collect($tags)->pluck('id'));

        $product->save();
        return new ProductResource($product);
    }

    public function apiProductDelete(Request $request)
    {
        $ids = $request->ids;
        $draftRemove = $request->draftRemove;
        if($draftRemove === "draft") {
            $this->authorize('restore', Product::withTrashed()->first());
            Product::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', Product::first());
            Product::destroy($ids);
        }
//        $products = Product::withTrashed()->whereIn('id', $ids)->get();
//        foreach($products as $product) {
////            $img_main = $product->img_main;
////            $images = $product->images;
////            $this->storage->delete($images);
////            $this->storage->delete($img_main);
//            $product->delete();
//        }

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
        return view('admin.product-create', compact('categories', 'tags'));
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
        return view('admin.product-details');
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
        return view('admin.product-create', compact('categories', 'tags'));
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
