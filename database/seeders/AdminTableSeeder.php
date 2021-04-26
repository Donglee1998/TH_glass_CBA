<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
        	['name'=>'dong','email'=>'dong@gmail.com','password'=>Hash::make('123456Ad')]
        ]);
    }
}
