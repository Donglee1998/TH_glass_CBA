<?php
namespace App\Repositories\Event;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class EventRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Event::class;
    }

    public function getEvent(){
    	$now = Carbon::now();
    	return $event = $this->model->where('status','public')->whereDate('public_time','>=',$now)->paginate(10)->appends(['sort' => 'id,desc','paginate'=>'1']);;	
    }

    public function listEvent($attributes = []){
        $now = Carbon::now();
    	$a = explode(',',$attributes['sort']);
    	return $event = $this->model->where('status','public')->whereDate('public_time','>=',$now)->orderBy($a[0], $a[1])->paginate($attributes['paginate'])->appends(['sort' => $attributes['sort'],'paginate'=>$attributes['paginate']]);
    }

    public function search($key){
        $event = $this->model->where('name','like', '%'.$key.'%')->paginate(10);
        return $event;
    }
}
