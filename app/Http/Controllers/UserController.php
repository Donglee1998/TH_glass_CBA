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
        $data['avatar'] = rand(0,9999).'_'.$request->file('avatar')->getClientOriginalName();
        $file=$request->file('avatar');
        $destinationPath = public_path('uploads/');
        $file->move( $destinationPath,$data['avatar']);

        $this->userRepo->create(['name'=>$request->name,'email'=>$request->email,'password'=>$request->password,'avatar'=> $data['avatar']]);
        return redirect()->route('admin.user-list');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
