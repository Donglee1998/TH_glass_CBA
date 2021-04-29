<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Banner\BannerRepository;

class BannerController extends Controller
{
	protected $bannerRepo;
    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
    }

    public function getIndex(){
    	$banner = $this->bannerRepo->getAll();
    	return view('admin.banners.index',compact('banner'));
    }
}
