@extends('layouts.master')
@section('content')
<div class="container">
	<section id="content">
		<form action="">
			<h1>Register Event</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" />
			</div>
			<div>
				<input type="text" placeholder="Email" required="" id="username" />
			</div>
			
			<div>
				<input type="submit" value="Register" />
				<a href="{{ route('index') }}">Back to Home</a>
				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
@endsection