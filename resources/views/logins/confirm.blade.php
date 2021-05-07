
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
		<form action="{{ route('registers.post') }}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<h1>Confirm Form</h1>
			<table>
				<tr>
					<td>
						<h4>Name: </h4>
					</td>
					<td>
						<h4>{{$data['name']}}</h4>
					</td>
				</tr>
				<tr>
					<td>
						<h4>Email: </h4>
					</td>
					<td>
						<h4>Avatar: </h4>
					</td>
				</tr>
				<tr>
					<td>
						<h4>{{$data['avatar']}} </h4>
					</td>
					<td>

						 <img style="width: 100px" src="{{ asset('storage/'.$data['avatar']) }}">
					</td>
				</tr>
			</table>
			
				<input type="hidden" placeholder="Username" required="" name="name" value="{{$data['name']}}" readonly/>
			
			
				<input type="hidden" placeholder="Email" required="" name="email" value="{{$data['email']}}" readonly />
		
				<input type="hidden" placeholder="Password" required="" name="password" value="{{$data['password']}}" />
			
				<input type="hidden" placeholder="Password" required="" name="avatar" value="{{$data['avatar']}}" />

				<input type="submit" value="Register" />
				
			</div>

		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
@endsection