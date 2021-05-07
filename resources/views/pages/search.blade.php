@extends('layouts.master')
@section('content')
 <main>
  <div class="container mx-auto">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" title="Trang chủ"><a href="{{route('index')}}"><i class="fas fa-home text-success"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Search</li>
      </ol>
    </nav>

    <div class="row">
    <div class="col-md-12 col-12">
      <p class="page-heading">Search</p>
      @if(Session::has('mess'))
        <div class="alert alert-danger" style="width: 40%; margin: auto auto">
            {{Session::get('mess')}}
        </div>
    @endif
     

    </div>
    @foreach($event as $item)
    <div class="col-4">
        <div  class="card" align="center"> 
        <img src="{{asset('uploads/'.$item->image)}}" style="width: 200px;height: 100px"   class="card-img-top mx-auto mt-1" title="">
        <div class="card-body">
        <p class="card-title">{{$item->name}}</p>
        <hr>
        <p class="card-text"><sup></sup></p>
        </div>
        <a href="{{ route('register_event',['id'=>$item->id])}}" ><div class="btn-detail">Xem chi tiết</div></a>

        </div>

        <div class="overlay">
        </div>
    </div>
    @endforeach
</div>

  <!-- row -->


</div>
<!-- container -->
{{-- {{$event->links()}} --}}
<div class="row-name" align="center">{{$event->links('vendor.pagination.custom')}}</div>
</main>

@endsection