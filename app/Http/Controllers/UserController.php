<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{

	protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getIndex(){
    	$user = $this->userRepo->getAll();
        return view('admin.users.index', compact('user'));
    }

    public function getAdd(){
    	return view('admin.users.add_user');
    }

    public function postAdd(Request $request){

    	$data = $request->all();
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're-password' => 'required|same:password',
               	'avatar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'email.required' => 'Vui long nhap email',
                'email.email' => 'Nhap khong dung dinh dang email',
                'email.unique' => 'Email da co nguoi su dung',
                'password.required' => 'Vui long nhap mat khau',
                're-password.same' => 'Mat khau khong giong nhau',
                'password.min' =>"Mat khau it nhat 6 ky tu",
                'password.max' => "Mat khau toi da 20 ky tu",
                'avatar.required'=>'Bạn chưa chọn avatar',
        
            ]
        );
        $this->userRepo->addUser($data);
        return redirect()->route('admin.user-list');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }


   	public function getEdit($id){
   		$user = $this->userRepo->find($id);
   		return view('admin.users.edit_user', compact('user'));
   	}

   	public function postEdit(Request $request, $id){
        $data = $request->all();
   		$this->validate($request,
            [
                'email' => 'required|email',
                'name' => 'required',
               	'avatar'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'email.required' => 'Vui long nhap email',
                'email.email' => 'Nhap khong dung dinh dang email',
                'email.unique' => 'Email da co nguoi su dung',
            ]
        );
   		$this->userRepo->editUser($data, $id);
        return redirect()->route('admin.user-list');
   	}

   	public function getDelete($id){
        $this->userRepo->delete($id);
        return redirect()->route('admin.user-list');
    }

}
