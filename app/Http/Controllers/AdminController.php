<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\Admin\AdminRepository;
use App\Repositories\Role\RoleRepository;
use Hash;
use App\Models\Admin;
use App\Models\Role;


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
        return view('admin.admins.index', ['admin' => $admin]);
    }

    public function getAddAdmin(){
        $role = $this->roleRepo->getAll();

        return view('admin.admins.add', compact('role'));
    }

    public function postAddAdmin(Request $request){
        $data = $request->all();
        $this->validate($request,
            [
                'email' => 'required|email|unique:admins,email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're-password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui long nhap email',
                'email.email' => 'Nhap khong dung dinh dang email',
                'email.unique' => 'Email da co nguoi su dung',
                'password.required' => 'Vui long nhap mat khau',
                're-password.same' => 'Mat khau khong giong nhau',
                'password.min' =>"Mat khau it nhat 6 ky tu",
                'password.max' => "Mat khau toi da 20 ky tu"
            ]
        );
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



    public function getUpdateAdmin($id){
        $admin = $this->adminRepo->viewAdmin($id);
        $roleOfAdmin = $admin->roles;
        $roles = $this->roleRepo->getAll();
        return view('admin.admins.edit_admin',compact('admin', 'roleOfAdmin', 'roles'));
    }

    public function updateAdmin(Request $request, $id){
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
            Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
            dd(1);

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
