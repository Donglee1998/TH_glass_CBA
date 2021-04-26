<?php
namespace App\Repositories\Role;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class RoleRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Role::class;
    }

    public function getRole(){
        $role = $this->model->with('permissions')->get();
        return $role;
    }

    public function viewRole($id){
        $role = $this->model->with('permissions')->find($id);
        return $role;
    }



}
