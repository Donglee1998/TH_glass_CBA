<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEvent(){

    	return view('events.event');
    }

    public function getRegister(){

    	return view('events.register_event');
    }
}
