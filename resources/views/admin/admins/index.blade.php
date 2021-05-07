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
             @foreach($acc->roles as $key=>$value)
                    <td><button style="width: 100px" type="button" class="btn btn-success">{{$value['role_name']}}</button>
                    </td>
                    <td>
                    @foreach($roles as $item)
                        @if($item->role_name=='admin')
                        @foreach($item->permissions as $key=>$value)
                            @if($value['permission_name']=='admin-edit')
                            <button class="btn btn-success"><a style="text-decoration: none" href="{{route('admin.update-admin',['id'=>$acc->id])}}">Edit</a></button>
                            @endif
                            @if($value['permission_name']=='admin-delete')
                            <button class="btn btn-danger"><a style="text-decoration: none" href="{{route('admin.delete-admin',['id'=>$acc->id])}}" class="delete">Delete</a></button>
                            @endif
                        @endforeach
                        @else
                            @if($value['role_name']!='admin')
                                @foreach($item->permissions as $key=>$value)
                            @if($value['permission_name']=='admin-edit')
                            <button class="btn btn-success"><a style="text-decoration: none" href="{{route('admin.update-admin',['id'=>$acc->id])}}">Edit</a></button>
                            @endif
                            @if($value['permission_name']=='admin-delete')
                            <button class="btn btn-danger"><a style="text-decoration: none" href="{{route('admin.delete-admin',['id'=>$acc->id])}}" class="delete">Delete</a></button>
                            @endif
                        @endforeach
                            @endif
                        @endif
                    @endforeach  
                    </td>
                @endforeach
        </tr>
        @endforeach
    </table>
@endsection
