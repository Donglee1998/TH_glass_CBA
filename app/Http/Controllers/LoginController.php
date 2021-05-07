<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepository;
use App\Http\Requests\RegisterRequest;
use Redirect;
use Session;
use URL;
use Socialite;
use Hash;
use File;
use Image;
use App\Models\User;


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

    public function postLogIn(LoginRequest $request){
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
        $data['password']=Hash::make($data['password']);
        $this->userRepo->create($data);
        return view('logins.login')->with(['mess'=>'Đăng ký tài khoản thành công']);
    }

    public function getLogOut(){
        Auth::logout();
        return view('logins.login');
    }

    public function getPassword(){
        return view('logins.password');
    }



    public function postConfirm(RegisterRequest $request){
        $data = $request->all();
        $file=$data['avatar'];
        $data['avatar'] = rand(0,9999).'_'.$data['avatar']->getClientOriginalName();
        $file->storeAs('images', $data['avatar'], 'public');
        return view('logins.confirm',compact('data'));
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider); 
        auth()->login($user); 
        return redirect()->route('index');
    }

    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $img = $getInfo->getAvatar();
            $filename = rand(0,99999);
            $img1 = Image::make($img)->save(public_path('uploads/' . $filename));
          $user = User::create([
             'name'     => $getInfo->name,
             'email'    => $getInfo->email,
             'avatar'    => $filename,
             'provider' => $provider,
             'provider_id' => $getInfo->id
         ]);
        }
        return $user;
    }
}
