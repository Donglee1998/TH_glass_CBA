<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getLogin(){
    	
    	return view('logins.login');
    }

    public function getRegister(){
    	
    	return view('logins.register');
    }

    public function getPassword(){
    	
    	return view('logins.password');
    }
}
