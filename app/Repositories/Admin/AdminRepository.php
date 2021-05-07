<?php
namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class AdminRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Admin::class;
    }

    // public function getAdmin()
    // {
    //     return $this->model->select('name')->take(5)->get();
    // }

    public function getAdmin(){
        $admin = $this->model->with('roles')->get();
    	return $admin;
    }

    public function findId($email){
        $admin = $this->model->where('email', $email)->get();
        foreach ($admin as $key) {
            return $key['id'];
        }
    }

    public function viewAdmin($id){
        $admin = $this->model->with('roles')->find($id);
        return $admin;
    }

    public function viewPermission($id){
        $admin = $this->model->with('permissions')->find($id);
        dd($admin);
        return $admin;
    }




}
