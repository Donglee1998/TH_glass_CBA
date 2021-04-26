@extends('admin.layouts.master')
@section('content')
<table style="border-spacing: 10px;width: 100%" align="center">
        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td colspan="4">
                <a href="{{ route('admin_addadmin') }}">Add Admin</a>
            </td>
        </tr>
        <tr class="header" style="text-align: center">
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Roles</td>
            <td>Actions</td>
        </tr>
        @foreach($admin as $acc)
        <tr style="text-align: center">
            <td>{{$loop->index+1}}</td>
            <td>{{$acc->name}}</td>
            <td>{{$acc->email}}</td>
            <td> @foreach($acc->roles as $key=>$value)
                    <button style="width: 100px" type="button" class="btn btn-success">{{$value['role_name']}}</button>

                @endforeach</td>
            <td><button class="btn btn-success"><a style="text-decoration: none" href="{{route('admin.update-admin',['id'=>$acc->id])}}">Edit</a></button>
                <button class="btn btn-danger"><a style="text-decoration: none" href="{{route('admin.delete-admin',['id'=>$acc->id])}}" class="delete">Delete</a></button>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
