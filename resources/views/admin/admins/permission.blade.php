{{--@extends('admin.layouts.master')--}}
{{--@section('content')--}}
{{--	<table class="table table-striped">--}}
{{--    <thead>--}}
{{--      <tr>--}}
{{--      	<th>#</th>--}}
{{--        <th>Roles</th>--}}
{{--        <th style="width: 60%; text-align: center;">Permission</th>--}}

{{--      </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    	@foreach($admin as $acc)--}}
{{--      <tr>--}}
{{--        <td>{{$loop->index+1}}</td>--}}
{{--        <td>{{$acc->role_name}}</td>--}}
{{--        <td>--}}
{{--            @foreach($acc->permissions as $key=>$value)--}}
{{--                <button type="button" class="btn btn-success">{{$value['permission_name']}}</button>--}}
{{--            @endforeach--}}
{{--        </td>--}}
{{--        <td></td>--}}
{{--      </tr>--}}
{{--     	@endforeach--}}
{{--    </tbody>--}}
{{--  </table>--}}

{{--@endsection--}}
