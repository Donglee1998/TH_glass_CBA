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

      <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Thêm vào giỏ hàng thành công !</strong>
      </div>

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

      <div class="row products"></div>

      <!-- pagination -->
      
      <!-- pagination -->

    </div>
  </div>
  <!-- row -->


</div>
<!-- container -->

</main>
@endsection