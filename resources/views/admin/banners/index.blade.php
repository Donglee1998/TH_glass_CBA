@extends('admin.layouts.master')
@section('content')
<table style="border-spacing: 10px;width: 100%" align="center">
        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td colspan="4">
                <a href="{{ route('admin.banner-add') }}">Add Banner</a>
            </td>
        </tr>
        <tr class="header" style="text-align: center">
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Actions</td>
        </tr>
        @foreach($banner as $item)
        <tr style="text-align: center">
            <td>{{$loop->index+1}}</td>
            <td>{{$item->name}}</td>
            <td><img src="{{asset('/uploads/'.$item->image)}}" style="max-height: 80px"></td>
            <td><button class="btn btn-success"><a style="text-decoration: none" href="{{ route('admin.banner-edit',['id'=>$item->id]) }}">Edit</a></button>
                <button class="btn btn-danger"><a style="text-decoration: none" href="{{ route('admin.banner-delete',['id'=>$item->id]) }}" class="delete">Delete</a></button>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
