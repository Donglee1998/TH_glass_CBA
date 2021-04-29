<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Hash;

class UserRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function addUser($attributes = []){
    	$file=$attributes['avatar'];
    	$attributes['avatar'] = rand(0,9999).'_'.$attributes['avatar']->getClientOriginalName();
        $destinationPath = public_path('uploads/');
        $file->move( $destinationPath,$attributes['avatar']);
        $attributes['password']=Hash::make($attributes['password']);
        return $this->model->create($attributes);
    }

    public function editUser($attributes = [], $id){
    	if(isset($attributes['avatar'])){
    		$file=$attributes['avatar'];
	    	$attributes['avatar'] = rand(0,9999).'_'.$attributes['avatar']->getClientOriginalName();
	        $destinationPath = public_path('uploads/');
	        $file->move( $destinationPath,$attributes['avatar']);
	        return $this->model->find($id)->update($attributes);
    	}
        	return $this->model->find($id)->update($attributes);
    }

    public function changePass($attributes = [], $id){
        $password = $this->model->find($id);
        if ($attributes['old-password'] = $password['password']) {
           return $this->model->find($id)->update($attributes);
        }else{
            return fall;
        }
        
    
    }
}
