<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
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

    public function postLogin(LoginRequest $request){
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





