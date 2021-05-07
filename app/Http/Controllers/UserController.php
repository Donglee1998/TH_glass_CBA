<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\RegisterRequest;


class UserController extends Controller
{

	protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getIndex(){
    	$user = $this->userRepo->getUser();
      return view('admin.users.index', compact('user'));
    }

    public function getAdd(){
    	return view('admin.users.add_user');
    }

    public function postAdd(RegisterRequest $request){
      	$data = $request->all();
        $file=$data['avatar'];
        $data['avatar'] = rand(0,9999).'_'.$data['avatar']->getClientOriginalName();
        $destinationPath = public_path('uploads/');
        $file->move( $destinationPath,$data['avatar']);
        $this->userRepo->create($data);
      return redirect()->route('admin.user-list');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }


   	public function getEdit($id){
   		$user = $this->userRepo->find($id);
   		return view('admin.users.edit_user', compact('user'));
   	}

   	public function postEdit(Request $request, $id){
      $data = $request->all();
      if(isset($data['avatar'])){
        $file=$data['avatar'];
        $data['avatar'] = rand(0,9999).'_'.$data['avatar']->getClientOriginalName();
        $destinationPath = public_path('uploads/');
        $file->move( $destinationPath,$data['avatar']);
        $this->userRepo->find($id)->update($data);
        return redirect()->route('admin.user-list');
      }
        $this->userRepo->find($id)->update($data);
        return redirect()->route('admin.user-list');
   	}

   	public function getDelete($id){
        $this->userRepo->delete($id);
        return redirect()->route('admin.user-list');
    }

}
