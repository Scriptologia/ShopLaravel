<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\TagResource;
use App\Models\Permission;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Tag::class);
        return view('admin.tags');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetTags(Request $request)
    {
        $this->authorize('viewAny', Tag::class);
        $search = $request->search;
        $filter = $request->filter;
        $created_at = json_decode($request->created_at);
        $order = $request->order;
        $dir = $request->dir;
        $tags = Tag::withTrashed()->with('products')->search($search)
            ->when($filter, function ($query) use($filter) { $query->where($filter, '!=', null);})
            ->when($created_at, function($query, $created_at) { $query->whereBetween('created_at', $created_at); })
            ->when($order, function ($query, $order) use ($dir) {
                if(in_array($order, (new Tag)->translatedAttributes)) {
                    $query->select('tags.*')->join('tag_translations', 'tag_translations.tag_id', '=', 'tags.id')->where('locale', '=', App::getLocale())
                        ->orderBy('tag_translations.name', $dir);//dd($query->first());
                }
                else {$query->orderBy($order, $dir); }
            })
            ->paginate(10);
        return TagResource::collection($tags);
    }

    public function apiTagEdit(Request $request)
    {
        $tag = Tag::withTrashed()->find($request->id);
        $this->authorize('view', $tag);
        return new TagResource($tag);
    }

    public function apiTagUpdate(Request $request)
    {
        $id = (int)$request->id;
        $valid = [];
        foreach (config('translatable.languages') as $v) {
            $valid += [$v . '.name' => ['required', 'max:100', 'min:3', Rule::unique('tag_translations', 'name')->ignore($id, 'tag_id')] ];
        }
        $validated = $request->validate($valid);
        if($request->id) {
            $tag = Tag::withTrashed()->find($id);
            $this->authorize('update', $tag);
        }
        else {
            $this->authorize('create', Tag::class);
            $tag = new Tag;
        }

        $tag->fill($request->all());
        $tag->slug = '';

        $tag->save();
        return new TagResource($tag);
    }

    public function apiTagDelete(Request $request)
    {
        $ids = $request->ids;
        $draftRemove = $request->draftRemove;
        if($draftRemove === "draft") {
            $this->authorize('restore', Tag::class);
            Tag::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', Tag::class);
            Tag::destroy($ids);
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
//        return view('admin.tag');
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $tags = Tag::withTrashed()->get();
        return view('admin.tags', compact('tags'));
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
