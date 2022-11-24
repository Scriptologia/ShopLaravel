<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\RoleResource;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Access\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Role::class);
        $permissions = Permission::get()->collect()->groupBy('model');
        return view('admin.roles', compact('permissions'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiGetRoles()
    {
        $this->authorize('viewAny', Role::class);
        $roles = Role::withTrashed()->with('permissions')->get();
        return RoleResource::collection($roles);
    }

    public function apiRoleEdit(Request $request)
    {
        $role = Role::withTrashed()->find($request->id);
        $this->authorize('view', $role);
        return new RoleResource($role);
    }

    public function apiRoleUpdate(Request $request)
    {
        $id = (int)$request->id;
        $validated = $request->validate([
            'name' => ['required', 'max:20',Rule::unique('roles')->ignore($id)],
            'description' => 'max:255',
            'permissionIds' => 'required'
        ]);
        if($request->id) {
            $role = Role::withTrashed()->find($id);
            $this->authorize('update', $role);
        }
        else {
            $this->authorize('create', Role::class);
            $role = new Role;
        }

        $role->fill($request->all());
        $role->slug = '';

        $role->save();
        $role->permissions()->sync($request->permissionIds);

        $role->save();
        return new RoleResource($role);
    }

    public function apiRoleDelete(Request $request)
    {
        $ids = $request->ids;
        if(in_array('1', $ids))  { $ids = array_filter($ids, function ($it) { return $it != '1' ;} ) ; return response('You can not detele Administrator.', 403);}
        $draftRemove = $request->draftRemove;
        if($draftRemove === "Deleted") {
            $this->authorize('restore', Role::class);
            Role::withTrashed()
                ->whereIn('id', $ids)
                ->restore();
        }
        else {
            $this->authorize('delete', Role::class);
            Role::destroy($ids);
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
//        return view('admin.role');
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $roles = Role::withTrashed()->with('permissions')->get();
        return view('admin.roles', compact('roles', 'tags'));
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
