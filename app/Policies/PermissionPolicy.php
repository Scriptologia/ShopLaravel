<?php

namespace App\Policies;

use App\Models\Permision;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if(!$user->role->permissions->containsStrict('slug', 'permission-view-all')) return Response::deny('You can not view this.');
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permision  $permision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Permision $permision)
    {
        if(!$user->role->permissions->containsStrict('slug', 'permission-view')) return Response::deny('You can not view this.');
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if(!$user->role->permissions->containsStrict('slug', 'permission-create')) return Response::deny('You can not create this.');
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permision  $permision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        if(!$user->role->permissions->containsStrict('slug', 'permission-edit')) return Response::deny('You can not edit this.');
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permision  $permision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        if(!$user->role->permissions->containsStrict('slug', 'permission-delete')) return Response::deny('You can not delete this.');
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permision  $permision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        if(!$user->role->permissions->containsStrict('slug', 'permission-restore')) return Response::deny('You can not restore this.');
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Permision  $permision
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Permision $permision)
    {
        if(!$user->role->permissions->containsStrict('slug', 'permission-force-delete')) return Response::deny('You can not restore this.');
        return true;
    }
}
