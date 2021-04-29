<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::insert([
        	['name'=>'dong','description'=>'Event sport','start_day'=>Carbon::parse('2021-05-01'),'number_of_participants'=>'200','image'=>'image1.jpg','public_time'=>Carbon::parse('2021-04-30'),'status'=>'public']
        ]);
    }
}
