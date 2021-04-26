@extends('admin.layouts.master')
@section('content')
    <table style="border-spacing: 10px;width: 100%" align="center">
        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td colspan="3">
                <a href="{{ route('admin.user-add') }}">Add user</a>
            </td>
            <td colspan="1">
                <a href="{{ route('admin.user-export') }}">Export file</a>
            </td>
        </tr>
        <tr class="header" style="text-align: center">
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Avatar</td>
            <td>Actions</td>
        </tr>
        @foreach($user as $item)
            <tr style="text-align: center">
                <td>{{$loop->index+1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><img src="{{asset('/uploads/'.$item->avatar)}}" style="max-height: 80px"></td>
                <td><button class="btn btn-success"><a style="text-decoration: none" href="">Edit</a></button>
                    <button class="btn btn-danger"><a style="text-decoration: none" href="" class="delete">Delete</a></button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
