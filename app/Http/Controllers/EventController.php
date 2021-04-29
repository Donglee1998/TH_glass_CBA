<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Event\EventRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EventImport;


class EventController extends Controller
{
    // public function getEvent(){

    // 	return view('events.event');
    // }

    // public function getRegister(){

    // 	return view('events.register_event');
    // }

    protected $eventRepo;
    public function __construct(EventRepository $eventRepo)
    {
        $this->eventRepo = $eventRepo;
    }

    public function getIndex(){
    	$event = $this->eventRepo->getAll();
    	return view('admin.events.index', compact('event'));
    }

    public function getAdd(){
    	return view('admin.events.add');
    }

    public function postAdd(Request $request){

    	 $this->validate($request,
            [
                'name' => 'required',
                'description' => 'required',
                'number_of_participants' => 'required|integer:500',
                'start_day' => 'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'public_time'=>'required',
                'status'=>'required'
            ],
            [
            ]);
    	$data = $request->all();
    	$data['image'] = rand(0,9999).'_'.$request->file('image')->getClientOriginalName();
        $file=$request->file('image');
        $destinationPath = public_path('uploads/');
        $file->move( $destinationPath,$data['image']);
        
        $this->eventRepo->create($data);
        return redirect()->route('admin.event-list');
    }

    public function import() 
    {
        Excel::import(new EventImport,request()->file('file')); 
        return redirect()->route('admin.event-list');
    }

    public function getEdit($id){
    	$event = $this->eventRepo->find($id);
    	return view('admin.events.edit', compact('event'));
    }

    public function postEdit(Request $request, $id){
    	$this->validate($request,
            [
                'name' => 'required',
                'description' => 'required',
                'number_of_participants' => 'required|integer:500',
                'start_day' => 'required',
                'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'public_time'=>'required',
                'status'=>'required'
            ],
            [
            ]);
    	$data = $request->all();
    	if (isset($data['image'])) {
 			$data['image'] = rand(0,9999).'_'.$request->file('image')->getClientOriginalName();
        	$file=$request->file('image');
        	$destinationPath = public_path('uploads/');
        	$file->move( $destinationPath,$data['image']);
        	$this->eventRepo->find($id)->update($data);
        	return redirect()->route('admin.event-list');
    	}
    	$this->eventRepo->find($id)->update($data);
    	return redirect()->route('admin.event-list');
    }

    public function getDelete($id){
    	$this->eventRepo->delete($id);
        return redirect()->route('admin.event-list');
    }
}
