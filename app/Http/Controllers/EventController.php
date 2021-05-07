<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Event\EventRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EventImport;
use App\Http\Requests\EventRequest;


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
    	$data = $request->all();
        $data['the_remaining_amount'] = $data['number_of_participants'];
        $this->eventRepo->create($data);
        return redirect()->route('admin.event-list');
    }

    public function postConfirm(EventRequest $request){
        $data = $request->all();
        $data['image'] = $data['hidden'];
        return view('admin.events.confirm', compact('data'));
    }

    public function cropper(Request $request){
        $file=$request->file('image');
        $destinationPath = public_path('uploads/');
        $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
        $upload = $file->move($destinationPath, $new_image_name);
        if($upload){
          return response()->json(['status'=>1, 'msg'=>['msg' => 'Image has been cropped successfully.', 'name' => $new_image_name], 'name'=>$new_image_name]);
        }else{
            return response()->json(['status'=>0, 'msg'=>'Something went wrong, try again later']);
        }

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
