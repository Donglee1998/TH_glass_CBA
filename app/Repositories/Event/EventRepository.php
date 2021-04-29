<?php
namespace App\Repositories\Event;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Event::class;
    }

    public function getEvent(){
    	$now = Carbon::now();
    	return $event = $this->model->where('status','public')->whereDate('public_time','>=',$now)->get();	
    }

    

  



}
