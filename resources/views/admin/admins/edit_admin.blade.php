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
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
        </div>
        <form class="user" method="post" action="{{ route('admin.update-admin',['id'=>$admin->id]) }}">
            {{csrf_field()}}

            <div class="form-group">

                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="name" value="{{$admin->name}}"
                           placeholder="Name ...">


            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" value="{{$admin->email}}"
                       placeholder="Email Address">
            </div>

            <div class="form-group col-2">
                <label>Role: </label>
                <select name="role" class="form-control select2-init" multiple>
                    @foreach($roles as $role )
                        <option {{$roleOfAdmin->contains('id', $role->id)?'selected':''}} value="{{$role->id}}">{{$role->role_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"  class="btn btn-primary btn-user btn-block">
                Edit
            </button>


        </form>

    </div>

@endsection
