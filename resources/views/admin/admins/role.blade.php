@extends('admin.layouts.master')
@section('content')
    <a href="{{ route('admin.role-add') }}">Add Admin</a>
    <table class="table table-striped">

        <thead>
        <tr>
            <th>#</th>
            <th>Roles</th>
            <th style="width: 60%; text-align: center;">Permission</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($admin as $acc)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$acc->role_name}}</td>
                <td>
                    @foreach($acc->permissions as $key=>$value)
                        <button type="button" class="btn btn-success">{{$value['permission_name']}}</button>
                    @endforeach
                </td>
                <td><button class="btn btn-success"><a style="text-decoration: none" href="{{route('admin.role-update',['id'=>$acc->id])}}">Edit</a></button>
                    <button class="btn btn-danger"><a style="text-decoration: none" href="{{route('admin.role-delete',['id'=>$acc->id])}}" class="delete">Delete</a></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
