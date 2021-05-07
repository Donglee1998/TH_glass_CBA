@extends('layouts.master')
@section('content')
@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
<div class="container">
	<section id="content">
		<form action="{{ route('confirm') }}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<h1>Register Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="name" />
			</div>
			<div>
				<input type="text" placeholder="Email" required="" name="email" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password" />
			</div>
			<div>
				<input type="password" placeholder="Re-assword" required=""  name="re-password" />
			</div>
			<div>
				<h4 style="text-align: left;">Avatar: <input type="file" placeholder="avatar" required="" name="avatar" /></h4>
			</div>
			<div>
				<input type="submit" value="Register" />
				<a href="{{ route('signin') }}">Back to Login</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
@endsection