<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleAdmin;

class RoleAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleAdmin::insert([
        	['admin_id'=>'1', 'role_id'=>1]
        ]);
    }
}
