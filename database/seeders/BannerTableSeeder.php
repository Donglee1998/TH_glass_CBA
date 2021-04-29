<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::insert([
        	['name'=>'hinh1','image'=>'banner1.png'],
        	['name'=>'hinh2','image'=>'banner3.png']

        ]);
    }
}
