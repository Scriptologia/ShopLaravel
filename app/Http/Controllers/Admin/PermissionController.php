<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Permission::class);
        return view('admin.permissions');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetPermissions()
    {
        $this->authorize('viewAny', Permission::class);
        $permissions = Permission::orderBy('model')->get();
        return PermissionResource::collection($permissions);
    }

    public function apiPermissionEdit(Request $request)
    {
        $permission = Permission::withTrashed()->find($request->id);
        $this->authorize('view', $permission);
        return new PermissionResource($permission);
    }

    public function apiPermissionUpdate(Request $request)
    {
        $id = (int)$request->id;
        $validated = $request->validate([
            'description' => 'max:255'
        ]);
        if($request->id) {
            $permission = Permission::withTrashed()->find($id);
            $this->authorize('update', $permission);
        }

        $permission->update(['description' => $request->description]);

        return new PermissionResource($permission);
    }

    public function apiPermissionDelete(Request $request)
    {
        $ids = $request->ids;
        $draftRemove = $request->draftRemove;
        if($draftRemove === "Deleted") {
            $this->authorize('restore', Permission::class);
            Permission::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', Permission::class);
            Permission::destroy($ids);
        }

        return response()->json([ 'ids' => $ids ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiPermissionCreate(Request $request)
    {
        $this->authorize('create', Permission::class);
        $validated = $request->validate([
            'model' => 'required|regex:/[a-zA-Z]/|max:20'
        ]);
        $model = $request->model;
        foreach(Permission::$permissionArr as $val){
            $slug = $model.'-'.$val;
            $permissions[] = Permission::firstOrCreate(['slug' => mb_strtolower($slug) ], ['model' => $model]);
        }
        return PermissionResource::collection($permissions);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $permissions = Permission::withTrashed()->with('permissions')->get();
        return view('admin.permissions', compact('permissions', 'tags'));
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
