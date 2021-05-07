<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function view(Admin $admin)
    {
        return $admin->checkPermissionAccess('admin-list');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->checkPermissionAccess('admin-add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function update(Admin $admin, $id)
    {
        $admin1 = $admin->roles;
        $role = Admin::find($id)->roles;
        foreach ($admin1 as $ad){
            foreach ($role as $ro){
                if($ro->role_name == 'admin'){
                    if($admin->checkPermissionAccess('admin-edit') && $ad->role_name  === $ro->role_name){
                        return true;
                    }
                    return false;
                }
            }
        }
        return $admin->checkPermissionAccess('admin-edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function delete(Admin $admin, $id)
    {
        $admin1 = $admin->roles;
        $role = Admin::find($id)->roles;
        foreach ($admin1 as $ad){
            foreach ($role as $ro){
                if($ro->role_name == 'admin'){
                    if($admin->checkPermissionAccess('admin-delete') && $ad->role_name  === $ro->role_name){
                        return true;
                    }
                    return false;
                }
            }
        }
        return $admin->checkPermissionAccess('admin-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function restore(User $user, Admin $admin)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return mixed
     */
    public function forceDelete(User $user, Admin $admin)
    {
        //
    }
}
