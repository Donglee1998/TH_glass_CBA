<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    //use HasFactory;
    protected $table = 'role_permissions';

    public function Role(){
    	return $this->belongsTo("App\Models\Role");
    }

    public function Permission(){
    	return $this->belongsTo("App\Models\Permission");
    }
}
