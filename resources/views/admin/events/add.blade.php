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
<form action="{{ route('admin.event-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
<div class="container">

   
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Event!</h1>
                            </div>
                            <form class="user" method="post" action="{{ route('admin.event-add') }}" enctype="multipart/form-data">
                            	{{csrf_field()}}
                                <div class="form-group">
                               
                                        <input type="text" class="form-control form-control-user" name="name"
                                            placeholder="Name ...">
    
                                </div>
                                <div class="form-group">
                                    <textarea style="width: 100%;border-radius: 20px;height: 100px" name="description" placeholder="  Description..."></textarea> 
                                </div>
                                <div class="form-group">
                                    <h6>Start day</h6>
                                    <input type="date" name="start_day">
                                </div>
                                <div class="form-group">
                                        <input type="number" class="form-control form-control-user" name="number_of_participants"
                                            placeholder="Number of participants...">
                                </div>
                                
                                <div class="form-group">
                                    <h6>Image: </h6>
                                    <input type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <h6>Public time</h6>
                                    <input type="date" name="public_time">
                                </div>
                                <div class="form-check">
                                  <input
                                    class="form-check-input"
                                    type="radio"
                                    value = "public"
                                    name="status"
                                  />
                                  <label class="form-check-label" for="flexRadioDefault1">Public</label>
                                </div>
                                <div class="form-check">
                                  <input
                                    class="form-check-input"
                                    type="radio"
                                    value = "unpublic"
                                    name="status"
                                  />
                                  <label class="form-check-label" for="flexRadioDefault1">Unpublic</label>
                                </div>
								<!-- Default checked radio -->
                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                	Add Account
                                </button>

                            </form>

    </div>
@endsection
