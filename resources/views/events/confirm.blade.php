@extends('layouts.master')
@section('content')
<main>
<div align="center">
	<form action="{{ route('register_event',['id'=>$event->id]) }}" method="post">
		{{csrf_field()}}
		<h2>Xác nhận thông tin đăng ký</h2>
		<table>
			<tr>
				<td><h4>Name: </h4></td>
				<td><h4>{{$user_name}}</h4></td>
			</tr>
			<tr>
				<td><h4>Đăng ký tham gia sự kiện: </h4></td>
				<td><h4>{{$event->name}}</h4></td>
			</tr>
			<tr>
				<td><h4>Thời gian bắt đầu sự kiện: </h4></td>
				<td><h4>{{date('d-m-Y', strtotime($event->start_day))}}</h4></td>
			</tr>
			<tr>
				<td><h4>Thời gian bắt đầu sự kiện: </h4></td>
				<td><h4>{{$event->description}}</h4></td>
			</tr>
		</table>
		<button class="alert alert-danger" style="border-radius: 10px;margin: auto" type="submit" >Register Event</button>
	</form>
</div>
</main>
@endsection