@extends('layouts.master')
@section('content')
<div class="container">
	<section id="content">
		<form action="">
			<h1>Reset password Form</h1>
			
			<div>
				<input type="text" placeholder="Email" required="" id="" />
			</div>
			
			<div>
				<input type="submit" value="Reset" />
				<a href="{{ route('signin') }}">Back to Login</a>
				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
@endsection