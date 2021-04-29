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

   
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Banner!</h1>
                            </div>
                            <form class="user" method="post" action="{{ route('admin.banner-add') }}" enctype="multipart/form-data">
                            	{{csrf_field()}}
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name"
                                            placeholder="Name ...">
                                </div>
                                <div class="form-group">
                                    <h6>Image: <input type="file" name="image"> </h6>
                                    
                                </div>
								<!-- Default checked radio -->
                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                	Add Banner
                                </button>

                            </form>

    </div>
@endsection
