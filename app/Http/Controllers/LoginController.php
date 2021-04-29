<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepository;
use Redirect;
use Session;
use URL;

class LoginController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->redirectTo = url()->previous();
    }

    public function getLogIn(Request $request){
        Session::put('url.intended',URL::previous());
    	return view('logins.login');
    }

    public function postLogIn(Request $request){

        $this->validate($request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20',
            ],
            [
                'email.required' => 'Vui long nhap email',
                'email.email' => 'Nhap khong dung dinh dang email',
                'password.required' => 'Vui long nhap mat khau',
                'password.min' =>"Mat khau it nhat 6 ky tu",
                'password.max' => "Mat khau toi da 20 ky tu"
            ]
        );
      
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return Redirect::to(Session::get('url.intended'));
        }else {
            return redirect()->back()->with(['error' => 'Dang nhap khong thanh cong']);
        }

    }




    public function getRegister(){
    	return view('logins.register');
    }

    public function postRegister(Request $request){
        $data = $request->all();
        $this->userRepo->addUser($data);
        return view('logins.login');
    }


    public function getLogOut(){
        Auth::logout();
        return view('logins.login');
    }

    public function getPassword(){
    	return view('logins.password');
    }
}
