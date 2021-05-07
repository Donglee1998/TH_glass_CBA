<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Role\RoleRepository;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminEditRequest;
use Hash;
use App\Models\Admin;
use App\Models\Role;
use Auth;


class AdminController extends Controller
{
    protected $adminRepo;
    protected $roleRepo;

    public function __construct(AdminRepository $adminRepo, RoleRepository $roleRepo)
    {
        $this->adminRepo = $adminRepo;
        $this->roleRepo = $roleRepo;
    }

    public function getIndex()
    {
        $admin = $this->adminRepo->getAdmin();
        $roles = auth()->user()->roles;
      
        return view('admin.admins.index', ['admin' => $admin, 'roles' => $roles]);
    }

    public function getAddAdmin(){
        $role = $this->roleRepo->getAll();
        return view('admin.admins.add', compact('role'));
    }

    public function postAddAdmin(Request $request){
        $data = $request->all();
        try {
            DB::beginTransaction();
            $data['password']=Hash::make($data['password']);
            $admin = $this->adminRepo->create($data);
            $admin->roles()->attach($request->role);
            DB::commit();
        return redirect()->route('admin_index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function postConfirm(AdminRequest $request){
        $data = $request->all();
        return view('admin.admins.confirm_admin', compact('data'));
    }



    public function getUpdateAdmin($id){
        $admin = $this->adminRepo->viewAdmin($id);
        $roleOfAdmin = $admin->roles;
        $roles = $this->roleRepo->getAll();
        return view('admin.admins.edit_admin',compact('admin', 'roleOfAdmin', 'roles'));
    }

    public function updateAdmin(AdminEditRequest $request, $id){
        $data = $request->all();
        try {
            DB::beginTransaction();
            $this->adminRepo->find($id)->update($data);
            $admin = $this->adminRepo->find($id);
            $admin->roles()->sync($request->role);
            DB::commit();
            return redirect()->route('admin_index');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd("Lỗi");

        }
    }

    public function deleteAdmin($id){
        $this->adminRepo->delete($id);
        return redirect()->route('admin_index');
    }


  //   public function getIndex(){
        // $admin = DB::table('admins')
        //      ->join('role_admins','admins.id','=','role_admins.admin_id')
        //      ->join('roles','roles.id','=','role_admins.role_id')
        //      ->select('admins.*','roles.*')
        //      ->get();
  //    return view('admin.pages.index',compact('admin'));
  //   }
}
