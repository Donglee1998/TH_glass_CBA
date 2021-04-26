<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAdmin extends Model
{
    use HasFactory;
    protected $table = 'role_admins';

    public function Role(){
    	return $this->belongsTo("App\Models\Role");
    }

    public function Admin(){
    	return $this->belongsTo("App\Models\Admin");
    }
    protected $fillable = [
        'admin_id', 'role_id'
    ];

}
