<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
    	
    	return view('pages.index');
    }

    public function getBlog(){
    	
    	return view('pages.blog');
    }

    public function getContact(){
    	
    	return view('pages.contact');
    }

    
}
