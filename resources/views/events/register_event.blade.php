@extends('layouts.master')
@section('content')
<main>
<div align="center">
	<form action="{{ route('register_event',['id'=>$event->id]) }}" method="post">
		{{csrf_field()}}
		<h1 style="text-align: center;">{{$event->name}}</h1>
		<h4 style="margin-left: 600px">Start date: {{date('d-m-Y', strtotime($event->start_day))}}</h4>
		<img src="{{ asset('uploads/'.$event->image) }}" style="width: 60%" height="40%">
		<h3 align="left" style="margin-left: 150px; margin-top: 20px">{{$event->description}}</h3>
		<button class="alert alert-danger" style="border-radius: 10px;margin: auto" type="submit" >Register Event</button>
	</form>
</div>
</main>
@endsection