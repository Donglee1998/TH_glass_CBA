@extends('layouts.master')
@section('content')
<div class="container">
	<section id="content">
		<form action="">
			<h1>Register Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" />
			</div>
			<div>
				<input type="text" placeholder="Email" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="password" placeholder="Re-assword" required="" id="password" />
			</div>
			<div>
				<input type="file" placeholder="image" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Register" />
				<a href="{{ route('signin') }}">Back to Login</a>
				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
@endsection