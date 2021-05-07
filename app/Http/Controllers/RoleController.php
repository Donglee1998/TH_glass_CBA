<?php

namespace App\Http\Controllers;

use App\Repositories\Role\RoleRepository;
use App\Repositories\Permission\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    protected $roleRepo;
    protected $permissionRepo;

    public function __construct(RoleRepository $roleRepo, PermissionRepository $permissionRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->permissionRepo = $permissionRepo;
    }

    public function getRole(){
        $admin = $this->roleRepo->getRole();
        return view('admin.admins.role',['admin' => $admin]);
    }

    public function addRole(){
        $permission = $this->permissionRepo->getPermissionParent();
        return view('admin.admins.add_role', compact('permission'));
    }

    public function postAddRole(RoleRequest $request){
        $role = $this->roleRepo->create(['role_name'=>$request->role_name,'display_name'=>$request->display_name]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('admin.role-list');
    }

    public function updateRole($id){
        $permissionParent = $this->permissionRepo->getPermissionParent();
        $role = $this->roleRepo->find($id);
        $permissionCheck = $role->permissions;
        return view('admin.admins.edit_role',compact('permissionCheck','permissionParent','role'));
    }

    public function postUpdateRole(RoleRequest $request, $id){
        $this->roleRepo->find($id)->update(['role_name'=>$request->role_name,'display_name'=>$request->display_name]);
        $role = $this->roleRepo->find($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('admin.role-list');
    }

    public function deleteRole($id){
        $this->roleRepo->delete($id);
        return redirect()->route('admin.role-list');
    }

}
