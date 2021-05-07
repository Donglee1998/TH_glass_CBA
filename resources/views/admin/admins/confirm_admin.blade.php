@extends('admin.layouts.master')
@section('content')

									<h1 style="text-align: center;">Confirm Form</h1>
									<table style="text-align: center;">
										<form action="{{ route('admin_add_admin') }}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
										<tr style="text-align: center;">
											<td>
												<h4>Name: </h4>
											</td>
											<td>
												<h4>{{$data['name']}}</h4>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td>
												<h4>Email: </h4>
											</td>
											<td>
												<h4>{{$data['email']}}</h4>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td>
												<h4>Role: </h4>
											</td>
											<td>
												 <h4>
												 	@if($data['role']==1)
												 		Admin
												 	@endif
												 	@if($data['role']==2)
												 		Manager
												 	@endif
												 	@if($data['role']==3)
												 		Normal
												 	@endif
												 </h4>
											</td>
										</tr>
										<input type="hidden" placeholder="Username" required="" name="name" value="{{$data['name']}}" readonly/>
									
									
										<input type="hidden" placeholder="Email" required="" name="email" value="{{$data['email']}}" readonly />
								
										<input type="hidden" placeholder="Password" required="" name="password" value="{{$data['password']}}" />
									
										<input type="hidden" placeholder="Password" required="" name="role" value="{{$data['role']}}" />

										
									</table>
									<input type="submit" value="Register" />
										
									

								</form><!-- form -->

@endsection