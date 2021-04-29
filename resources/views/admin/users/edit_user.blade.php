@extends('admin.layouts.master')
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

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit an User!</h1>
                            </div>
                            <form class="user" method="post" action="{{ route('admin.user-edit',['id'=>$user->id]) }}" enctype="multipart/form-data">
                            	{{csrf_field()}}
                                <div class="form-group">
                               
                                        <input type="text" class="form-control form-control-user" name="name" value="{{$user->name}}" 
                                            placeholder="Name ...">
    
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" value="{{$user->email}}" 
                                        placeholder="Email Address">
                                </div>
                         
                                <div class="form-group">
                                    <h6>Avatar: </h6>
                                    <img src="{{asset('/uploads/'.$user->avatar)}}" style="max-height: 80px">
                                    <input type="file" name="avatar">
                                </div>
								<!-- Default checked radio -->
                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                	Edit User
                                </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
