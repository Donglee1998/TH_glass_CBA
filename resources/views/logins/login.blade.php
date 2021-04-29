@extends('layouts.master')
@section('content')
<div class="container">
	<section id="content">
		<form action="{{ route('signin') }}" method="post">
			{{csrf_field()}}
			<h1>Login Form</h1>
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<div>
				<input type="text" placeholder="Username" required="" id="username" name="email" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" name="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="{{route('password')}}">Lost your password?</a>
				<a href="{{route('registers')}}">Register</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
@endsection