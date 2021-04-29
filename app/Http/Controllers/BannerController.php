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

    public function getAdd(){
    	return view('admin.banners.add');
    }

    public function postAdd(Request $request){
    	$this->validate($request,
            [
                'name' => 'required',
               	'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
            ]);
    	$data = $request->all();
    	$data['image'] = rand(0,9999).'_'.$request->file('image')->getClientOriginalName();
        $file=$request->file('image');
        $destinationPath = public_path('uploads/');
        $file->move( $destinationPath,$data['image']);
        $this->bannerRepo->create($data);
        return redirect()->route('admin.banner-list');
    }

    public function getEdit($id){
    	$banner = $this->bannerRepo->find($id);
    	return view('admin.banners.edit',compact('banner'));
    }

    public function postEdit(Request $request, $id){
    	$this->validate($request,
            [
                'name' => 'required',
               	'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
            ]);

    	$data = $request->all();
    	if (isset($data['image'])) {
    		$data['image'] = rand(0,9999).'_'.$request->file('image')->getClientOriginalName();
        	$file=$request->file('image');
        	$destinationPath = public_path('uploads/');
        	$file->move( $destinationPath,$data['image']);
        	$this->bannerRepo->find($id)->update($data);
        	return redirect()->route('admin.banner-list');
    	}
    	$this->bannerRepo->find($id)->update($data);
        return redirect()->route('admin.banner-list');
    }

    public function getDelete($id){
    	$this->bannerRepo->delete($id);
    	return redirect()->route('admin.banner-list');
    }
}
