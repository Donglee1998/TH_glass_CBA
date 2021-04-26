<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginAdminController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */



    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //$this->middleware('guest:admin')->except('logout');
    }

    public function guard()
    {
        return \Illuminate\Support\Facades\Auth::guard('admin');
    }


    public function getLogin(){

    	return view('admin.logins.login');
    }

    public function postLogin(Request $request){

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
    	$arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::guard('admin')->attempt($arr)) {
        	return redirect()->route('admin_index');
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Dang nhap khong thanh cong']);
        }
    }
    public function getLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}





