@extends('layouts.master')
@section('content')
<div class="container">
	<section id="content">
		<form action="{{ route('reset-password') }}" method="post">
			{{csrf_field()}}
			<h1>Reset password Form</h1>
			<div>
				<input type="text" placeholder="Email" required="" id="" name="email" />
			</div>
			
			<div>
				<input type="submit" value="Reset" />
				<a href="{{ route('signin') }}">Back to Login</a>
				
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
@endsection