@extends('admin.layouts.master')
@section('content')
    <table style="border-spacing: 10px;width: 100%" align="center">
        <tr class="control" style="text-align: left; font-weight: bold; font-size: 20px">
            <td colspan="3">
                <a href="{{ route('admin.event-add') }}">Add Event</a>
            </td>
            
        </tr>
        <tr class="header" style="text-align: center">
            <td>#</td>
            <td style="width: 10%">Name</td>
            <td style="width: 20%">Description</td>
            <td style="width: 10%">Start Day</td>
            <td style="width: 10%">Number of participants</td>
            <td style="width: 15%">Image</td>
            <td style="width: 10%">Public time</td>
            <td style="width: 10%">Status</td>
            <td>Actions</td>
        </tr>
        @foreach($event as $item)
            <tr style="text-align: center">
                <td>{{$loop->index+1}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{date('d-m-Y', strtotime($item->start_day))}}</td>
                <td>{{$item->number_of_participants}}</td>
                <td><img src="{{asset('/uploads/'.$item->image)}}" style="max-height: 80px"></td>
                <td>{{date('d-m-Y', strtotime($item->public_time))}}</td>
                <td>{{$item->status}}</td>
                <td><button class="btn btn-success"><a style="text-decoration: none" href="{{ route('admin.event-edit',['id'=>$item->id]) }}">Edit</a></button>
                    <button class="btn btn-danger"><a style="text-decoration: none" href="{{ route('admin.event-delete',['id'=>$item->id]) }}" class="delete">Delete</a></button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
