<?php
namespace App\Repositories\Banner;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class BannerRepository extends BaseRepository
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Banner::class;
    }

    // public function getAdmin()
    // {
    //     return $this->model->select('name')->take(5)->get();
    // }

    




}
