@extends('layouts.master')
@section('content')
@if(Session::has('mess'))
        <div class="alert alert-danger" style="width: 40%; margin: auto auto">
            {{Session::get('mess')}}
        </div>
@endif
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
	<div class="container" style="margin-left: 300px">
		    <a class="btn btn-lg btn-social btn-facebook" href="{{ route('redirect','facebook') }}">
		    <i class="fa fa-facebook fa-fw"></i> Sign in with Facebook
		    </a>
		</div>
		<div class="container" style="margin-left: 300px;">
		    <a class="btn btn-lg btn-social btn-facebook" style="background-color: red" href="{{ route('redirect','google') }}">
		    <i class="fa fa-facebook fa-fw"></i> Sign in with Google++
		    </a>
		</div>
</div><!-- container -->
@endsection