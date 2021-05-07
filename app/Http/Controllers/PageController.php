<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Repositories\Event\EventRepository;
use Auth;
use App\Models\User;
use App\Http\Requests\PasswordRequest;
use Hash;

class PageController extends Controller
{

    protected $userRepo;
    protected $eventRepo;

    public function __construct(UserRepository $userRepo, EventRepository $eventRepo)
    {
        $this->userRepo = $userRepo;
        $this->eventRepo = $eventRepo;
    }

    public function getIndex(){
    	
    	return view('pages.index');
    }

    public function getBlog(){
    	
    	return view('pages.blog');
    }

    public function getContact(){
    	
    	return view('pages.contact');
    }

    public function getProfile(){
        return view('pages.profile');
    }

    public function postProfile(Request $request){
        $data = $request->all();
        $id = Auth::user()->id;
        if(isset($data['avatar'])){
        $file=$data['avatar'];
        $data['avatar'] = rand(0,9999).'_'.$data['avatar']->getClientOriginalName();
        $file->storeAs('images', $data['avatar'], 'public');
        $this->userRepo->find($id)->update($data);
        return redirect()->back();
     }
        $this->userRepo->find($id)->update($data);
        return redirect()->back();
    }

    public function getChange(){
        return view('pages.change');
    }

    public function postChange(PasswordRequest $request){
        $data = $request->all();
        $id = Auth::user()->id;
        $password = $this->userRepo->find($id);
        if (Hash::check($data['old-password'], $password['password'])) {
            $data['password']=Hash::make($data['password']);
           $this->userRepo->find($id)->update($data);
           return redirect()->route('profile')->with(['mess'=>'Thay đổi mật khẩu thành công']);
        }
            return redirect()->back()->with(['mess'=>'Mật khẩu bạn nhập không chính xác']);
    }
    
    public function getEvent(Request $request){
        $data = $request->all();
        if(empty($data)){
            $event = $this->eventRepo->getEvent();
            return view('events.index', compact('event'));
        }else{
            $event = $this->eventRepo->listEvent($data);
            $dulieu = $data['sort'];
            return view('events.index', compact('event','dulieu'));
        }
    }


    public function getRegister($id){
            $event = $this->eventRepo->find($id);
            return view('events.register_event', compact('event'));
    
    }

    public function confirmRegisterEvent($id){
        if(Auth::check()){
        $user_name = Auth::user()->name;
        $event = $this->eventRepo->find($id);
        return view('events.confirm', compact('user_name', 'event'));
        }else{
            return redirect()->route('signin');
        }
    }

    public function postRegister($id){
        $user_id = Auth::user()->id;
        $user = $this->userRepo->getUserId($user_id);
        $event = $this->eventRepo->find($id);
        foreach ($user->events as $key => $value) {
            if($value['id']===$event->id){
                return redirect()->route('event')->with(['mess'=>'Bạn đã đăng ký sự kiện này rồi']);
            }
        }
        $this->eventRepo->find($id)->update(['the_remaining_amount'=>$this->eventRepo->find($id)->the_remaining_amount-1]);
        $user = $this->userRepo->find($user_id);
        $user->events()->attach($id);
        return redirect()->route('event')->with(['mess'=>'Đăng ký sự kiện thành công']);
    }

    public function postSearch(Request $request){
        $data = $request->all();
        $event = $this->eventRepo->search($data['search']);
        return view('pages.search', compact('event'));
    }
}
