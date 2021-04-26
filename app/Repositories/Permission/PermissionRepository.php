<?php
namespace App\Repositories\Permission;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class PermissionRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Permission::class;
    }



    public function getPermissionParent(){
        $permission = $this->model->where('parent_id',0)->get();
        return $permission;
    }



}
