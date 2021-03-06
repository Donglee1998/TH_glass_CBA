@extends('layouts.master')
@section('content')
 <main>
  <div class="container mx-auto">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" title="Trang chủ"><a href="{{route('index')}}"><i class="fas fa-home text-success"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Events</li>
      </ol>
    </nav>

    <div class="row">
    <div class="col-md-12 col-12">
      <p class="page-heading">Events</p>
      @if(Session::has('mess'))
        <div class="alert alert-danger" style="width: 40%; margin: auto auto">
            {{Session::get('mess')}}
        </div>
    @endif
      {{-- <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Thêm vào giỏ hàng thành công !</strong>
      </div> --}}

      {{-- <div class="sort-box">
        <span>Sắp xếp theo: </span>
        <select class="sort">
          <option value="default">Mặc định</option>
          <option value="name">Tên A-Z</option>
          <option value="price">Giá (thấp-cao)</option>
        </select>
      </div> --}}

     {{--  <span class="open-filter" title="Lọc sản phẩm"> <i class="fas fa-filter"></i></span>
      <span class="close-filter" title="Đóng"> <i class="fas fa-window-close"></i></span>  --}}   

      

      <!-- pagination -->
      
      <!-- pagination -->
<form action="{{route('event')}}" method="get">
  
    <table style="margin-left: 550px">
        <tr>
            <td><span>Sắp xếp theo: </span>
                <select class="sort" name="sort">
                    <option value="id,desc">Mới nhất</option>
                    <option value="id,asc">Cũ nhất</option>
                    <option value="the_remaining_amount,asc">Gần hết chỗ</option>
                </select>
            </td>
            <td>
                <span>Số Event: </span>
                <select class="sort" name="paginate">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">50</option>
                </select>
            </td>
            <td>
                <button class="fa fa-filter" type="submit"></button>
            </td>
        </tr>
    </table>


</form>
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