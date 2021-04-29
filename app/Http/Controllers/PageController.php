<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Repositories\Event\EventRepository;
use Auth;
use App\Models\User;

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
        $this->userRepo->editUser($data, $id);
        return redirect()->back();
    }

    public function getChange(){
        return view('pages.change');
    }

    public function postChange(Request $request){
        $data = $request->all();
        $id = Auth::user()->id;
        $a = $this->userRepo->changePass($data, $id);
        if(is_null($a)){
            return redirect()->back();
        }
        return redirect()->route('profile');
    }
    
    public function getEvent(){
        $event = $this->eventRepo->getEvent();
        return view('events.index', compact('event'));
    }

    public function getRegister($id){
        if(Auth::check()){
            $event = $this->eventRepo->find($id);
            return view('events.register_event', compact('event'));
        }else{
            return redirect()->route('signin');
        }
    }

    public function postRegister($id){
        $user_id = Auth::user()->id;
        $this->eventRepo->find($id)->update(['the_remaining_amount'=>$this->eventRepo->find($id)->the_remaining_amount-1]);
        $user = $this->userRepo->find($user_id);
        $user->events()->attach($id);
    }
}
