@extends('layouts.master')
@section('content')
<main>
    <div class="container">

      <!-- Breadcrums -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home icon-fa text-success"></i> Trang chủ</a></li>
          <li class="breadcrumb-item active">Blog</li>
        </ol>
      </nav>

       

      <div class="row">
        <!-- Left -->
        <div class="col-md-12 main-news">
         <h2 class="text-center my-5 page-heading">Tin tức</h2>
         <div class="card card-1">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/anh-tin-tuc/img1.png" class="card-img" alt="Ảnh tinh tức" title="Ảnh tinh tức">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                 <p class="card-text category"><small class="text-muted">BLOG - TIN TỨC </small></p>
                <h5 class="card-title">11 cách trang nhà độc đáo từ vỏ chai thủy tinh</h5>
                <p class="card-text">Bạn chẳng biết làm gì với những vỏ chai thủy tinh ngoài việc vứt đi? Đừng lãng phí như thế, bạn có thể dùng chúng để trang trí nhà cực đẹp!.</p>
                <a href="#!" class="black-text float-right justify-content-end"><h6>Đọc tiếp <i class="fas fa-angle-double-right"></i></h6></a>
                <p class="card-text"><small class="text-muted"><i class="far fa-user"></i> Post by Thien | <i class="far fa-calendar-alt"></i> 12/05/2019 </small></p>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-2">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/anh-tin-tuc/img2.png" class="card-img" alt="Ảnh tin tức" title="Ảnh tin tức">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                 <p class="card-text category"><small class="text-muted">BLOG - TIN TỨC </small></p>
                <h5 class="card-title">Hướng dẫn chọn mua và sử dụng chai lọ thủy tinh</h5>
                <p class="card-text">Ngày nay, chai lọ thủy tinh ngày càng được ưa chuộng với rất nhiều mẫu mã đa dạng, phong phú và giá thành hợp lý với tất cả người tiêu dùng.</p>
                <a href="#!" class="black-text float-right justify-content-end"><h6>Đọc tiếp <i class="fas fa-angle-double-right"></i></h6></a>
                <p class="card-text"><small class="text-muted"><i class="far fa-user"></i> Post by Thien | <i class="far fa-calendar-alt"></i> 12/05/2019 </small></p>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-3">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/anh-tin-tuc/img3.png" class="card-img" alt="Ảnh tin tức" title="Ảnh tin tức">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                 <p class="card-text category"><small class="text-muted">ĐÁNH GIÁ SẢN PHẨM</small></p>
                <h5 class="card-title">So sánh ưu nhược điểm của thủy tinh với nhựa</h5>
                <p class="card-text">Chọn nhựa hay thủy tinh? Thực tế cho thấy khi cần lưu trữ các loại thực phẩm trong thời gian dài chúng ta vẫn ưu tiên sử dụng các sản phẩm được làm bằng thủy tinh.</p>
                <a href="#!" class="black-text float-right justify-content-end"><h6>Đọc tiếp <i class="fas fa-angle-double-right"></i></h6></a>
                <p class="card-text"><small class="text-muted"><i class="far fa-user"></i> Post by Thien | <i class="far fa-calendar-alt"></i> 12/05/2019 </small></p>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-4">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/anh-tin-tuc/img4.png" class="card-img" alt="Ảnh tin tức" title="Ảnh tin tức">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                 <p class="card-text category"><small class="text-muted">BLOG - TIN TỨC </small></p>
                <h5 class="card-title">Bao bì thủy tinh - Xu hướng tiêu dùng hiện nay</h5>
                <p class="card-text">Thủy tinh là chất liệu cao cấp hoàn toàn thân thiện với môi trường. Khác với nhựa, thủy tinh có khả năng chịu nhiệt tốt, không gây phản ứng hóa học với các chất đựng ở bên trong. </p>
                <a href="#!" class="black-text float-right justify-content-end"><h6>Đọc tiếp <i class="fas fa-angle-double-right"></i></h6></a>
                <p class="card-text"><small class="text-muted"><i class="far fa-user"></i> Post by Thien | <i class="far fa-calendar-alt"></i> 12/05/2019 </small></p>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-5">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="images/anh-tin-tuc/img5.png" class="card-img" alt="Ảnh tin tức" title="Ảnh tin tức">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                 <p class="card-text category"><small class="text-muted">BỘ SƯU TẬP</small></p>
                <h5 class="card-title">Lọ thủy tinh mini - Top 9 mẫu đẹp đáng mua nhất</h5>
                <p class="card-text">Lọ thủy tinh mini là một trong những sản phẩm đang được ưa chuộng nhất hiện nay bởi tính thiết kế nhỏ gọn, chắc chắn và sử dụng được dưới nhiều công dụng khác nhau.</p>
                <a href="#!" class="black-text float-right justify-content-end"><h6>Đọc tiếp <i class="fas fa-angle-double-right"></i></h6></a>
                <p class="card-text"><small class="text-muted"><i class="far fa-user"></i> Post by Thien | <i class="far fa-calendar-alt"></i> 12/05/2019 </small></p>
              </div>
            </div>
          </div>
        </div>

         <!-- Pagination -->
        
        <!-- Pagination -->

      </div>
      <!-- Left -->

     
    </div>
  </div>
</main>
@endsection