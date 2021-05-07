@extends('admin.layouts.master')
@section('content')

									<h1 style="text-align: center;">Confirm Form</h1>
									<table style="text-align: center;" style="margin-left: 300px">
										<form action="{{ route('admin.event.add') }}" method="post" enctype="multipart/form-data">
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
												<h4>Description: </h4>
											</td>
											<td>
												<h4>{{$data['description']}}</h4>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td>
												<h4>Start day: </h4>
											</td>
											<td>
												<h4>{{$data['start_day']}}</h4>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td>
												<h4>Number of participants: </h4>
											</td>
											<td>
												<h4>{{$data['number_of_participants']}}</h4>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td>
												<h4>Public time: </h4>
											</td>
											<td>
												<h4>{{$data['public_time']}}</h4>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td>
												<h4>Status: </h4>
											</td>
											<td>
												<h4>{{$data['status']}}</h4>
											</td>
										</tr>
										<tr style="text-align: center;">
											<td>
												<h4>Image: </h4>
											</td>
											<td>
												 <img style="width: 100px" src="{{ asset('uploads/'.$data['image']) }}">
											</td>
										</tr>

										<input type="hidden" placeholder="Username" required="" name="name" value="{{$data['name']}}" readonly/>
									
										<input type="hidden" placeholder="Email" required="" name="description" value="{{$data['description']}}" readonly />
								
										<input type="hidden" placeholder="Password" required="" name="start_day" value="{{$data['start_day']}}" />
									
										<input type="hidden" placeholder="Password" required="" name="number_of_participants" value="{{$data['number_of_participants']}}" />
										<input type="hidden" placeholder="Password" required="" name="public_time" value="{{$data['public_time']}}" />
										<input type="hidden" placeholder="Password" required="" name="status" value="{{$data['status']}}" />
										<input type="hidden" placeholder="Password" required="" name="image" value="{{$data['image']}}" />

										
									</table>
									<input type="submit" value="Register" style="margin-left: 300px" />
										
									

								</form><!-- form -->

@endsection