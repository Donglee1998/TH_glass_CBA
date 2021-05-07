<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'roles';
    protected $guarded = [];
    public function RoleAdmin(){
    	return $this->hasMany("App\Models\RoleAdmin");
    }
    public function RolePermission(){
    	return $this->hasMany("App\Models\RolePermission");
    }



    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

}
