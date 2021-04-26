<?php

namespace App\Http\Controllers;

use App\Repositories\Role\RoleRepository;
use App\Repositories\Permission\PermissionRepository;
use Illuminate\Http\Request;

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

    public function postAddRole(Request $request){

        $this->validate($request,
            [
                'role_name' => 'required|unique:roles',
                'display_name' => 'required',
                'permission_id' => 'required'
            ],
            [
                'role_name.required' => 'Vui lòng nhập role name',
                'role_name.unique' => 'Role name đã được sử dụng',
                'display_name.required' => 'Vui lòng nhập mô tả của role',
                'permission_id'=>'Vui lòng chọn permissions'
            ]
        );

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

    public function postUpdateRole(Request $request, $id){
        $this->validate($request,
            [
                'role_name' => 'required',
                'display_name' => 'required',
                'permission_id' => 'required'
            ],
            [
                'role_name.required' => 'Vui lòng nhập role name',
                'role_name.unique' => 'Role name đã được sử dụng',
                'display_name.required' => 'Vui lòng nhập mô tả của role',
                'permission_id'=>'Vui lòng chọn permissions'
            ]
        );

        $this->roleRepo->find($id)->update(['role_name'=>$request->role_name,'display_name'=>$request->display_name]);
        $role = $this->roleRepo->find($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('admin.role-list');
    }

}
