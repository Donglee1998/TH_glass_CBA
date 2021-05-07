
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <title>TH glass</title>
  <link rel="shorcut icon" type="image/png" href="{{asset('images/favicon.png')}}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Slick CSS -->
  <link rel="stylesheet" href="{{asset('css/slick.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
  <!-- Wow CSS -->
  <link rel="stylesheet" href="https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css">
  <!-- Global CSS -->
  <link rel="stylesheet" href="{{asset('css/global.css')}}">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
  <!-- Header -->
  <link rel="stylesheet" href="{{asset('css/header.css')}}">
  <!-- Footer CSS -->
  <link rel="stylesheet" href="{{asset('css/footer.css')}}">
  <!-- Menu CSS -->
  <link rel="stylesheet" href="{{asset('css/menu.css')}}">

  <link rel="stylesheet" href="{{asset('css/login.css')}}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Roboto:400,500&display=swap&subset=vietnamese" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <div id="header">
  <div class="header">
   <!-- Menu -->
   <div class="container-fluid menu-wrap">
    <div class="container mx-auto menu">
      <div class="logo"> <a href="#"><img src="{{asset('images/logo1.svg')}}" alt="logo" title="Logo"></a></div>
      <nav>
        <ul>
          <li><a href="{{route('index')}}" title="Trang chủ">Home</a></li>
          <li><a href="{{route('event')}}" title="Sản phẩm">Events</a></li>
          <li><a href="{{route('blog')}}" title="Tin tức">Blog</a></li>
          <li><a href="{{route('contact')}}" title="Liên hệ">Contact</a></li>
          @if(Auth::check())
            <li title="Profile"><a id="icon-shopping-cart" href="{{ route('profile') }}" class="fas fa-file-alt"><i class="bi bi-box-arrow-right"></i></a></li>
            <li title="Đăng xuất"><a id="icon-shopping-cart" href="{{ route('signout') }}" class="fas fa-sign-out-alt"><i class="bi bi-box-arrow-right"></i></a></li>
          @else
          <li title="Đăng nhập"><a id="icon-shopping-cart" href="{{route('signin')}}" class="fas fa-sign-in-alt"><i class="bi bi-box-arrow-right"></i></a></li>
          @endif
          <form style="margin: auto" action="{{ route('search') }}" method="post">
            @csrf
          <li title="Tìm kiếm" ><input type="text" name="search" style="height: 30px"><button class="fas fa-search" type="submit"></button></li>
          </form>
          <!-- Cart -->
          <!-- <div class="cart-overlay">
            <div class="cart">
              <span class="close-cart"><i class="far fa-window-close fa-2x" title="Ẩn giỏ hàng"></i></span>
              <h5 class="cart-heading">Giỏ hàng của bạn</h5>
              <div class="cart-content">
                <div class="row cart-title">
                  <div class="col-4 cart-title-item">Sản phẩm</div>
                  <div class="col-2 cart-title-item">Giá tiền</div>
                  <div class="col-2 cart-title-item">Số lượng</div>
                  <div class="col-2 cart-title-item">Thành tiền</div>
                  <div class="col-2 cart-title-item"></div>
                </div>

                <div class="cart-items"></div>

                <div class="cart-total">
                 <strong class="cart-total__title">Tổng tiền:  <span class="cart-total__price">0.000 đ</span></strong>
                </div>

               <div class="cart-btn">
                 <a href="product.html" class="btn-continue-shopping">Tiếp tục mua hàng</a>  
                 <a href="checkout.html" class="btn-pay">Tiến hành thanh toán</a>  
               </div>
             </div>
           </div> 
         </div> -->
          <!-- cart -->
       <!-- </div> -->
     </ul>
   </nav>
   <div class="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></div>
 </div>
</div>





</div>








<!-- Hộp tìm kiếm -->







</div>
  @yield('content')  

  <!-- Main -->


<!-- Footer -->
<div id="footer">
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}">


	<footer>
		<div class="page-footer font-small blue-grey lighten-5">
			

			<!-- Footer Links -->
			<div class="footer">
				<div class="container text-center text-md-left">
					<div class="row dark-grey-text">
						<div class="col-md-3 col-lg-4 col-xl-3 mb-4">
							<!-- Content -->
							<p class="footer-logo"><img src="images/logo-footer.svg" alt="Logo" title="Logo"></p>
							<!-- <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;"> -->
							<p class="footer-text"><i class="fas fa-map-marker-alt text-white"></i> Số 1, ngõ 148 Phúc Diễn, Nam Từ Liêm, Hà Nội</p>
							<p class="footer-text"><i class="fas fa-phone-alt text-white"></i> 0973xxxxxxxx</p>
							<p class="footer-text"><i class="fas fa-envelope text-white"></i> Thglass@gmail.com/p>
						</div>

						<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer-links">
							<!-- Links -->
							<h6 class="list-title">Quick link</h6>
							<hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto bg-white" style="width: 80px;">
							<p>
								<a class="text-white footer-link" href="{{route('index')}}">Home</a>
							</p>
							<p>
								<a class="text-white footer-link" href="{{route('event')}}">About us</a>
							</p>
							<p>
								<a class="text-white footer-link" href="product.html">Event</a>
							</p>
							<p>
								<a class="text-white footer-link" href="news.html">Blog</a>
							</p>
						</div>

						<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 footer-info">
							<!-- Links -->
							<h6 class="list-title">Information</h6>
							<hr class="teal accent-3 mb-4 mt-0 d-inline-block bg-white" style="width: 60px;">
					
							
							
							<p>
								<a class="text-white footer-link" href="contact.html#map-container-section">Map</a>
							</p>
						</div>

						<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
							<h6 class="list-title">Blog</h6>
							<hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto bg-white" style="width: 40px;">
							<p class="footer-link">Sign up to receive information as soon as possible</p>
							<form>
								<input class="form__email" type="email" name="email" placeholder="Vui lòng điền email của bạn ở đây" required="">
								<input class="form__submit" type="submit" name="submit" value="Đăng ký">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>


<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v4.0'
    });
  };
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Your customer chat code -->
  <div class="fb-customerchat"
  attribution=setup_tool
  page_id="2071419156449295"
  logged_in_greeting="Xin chào,  hãy gửi tin nhắn cho chúng tôi."
  logged_out_greeting="Xin chào,  hãy gửi tin nhắn cho chúng tôi.">
</div>
<script type="text/javascript">
	function search(){
		document.getElementById("search-box").style.display = 'block';

	}
</script>

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<!-- Popper.js -->
<script src="{{ asset('js/popper.min.js') }} "></script>
<!-- Bootstrap JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Slick JS -->
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- Wow JS -->
<script src="https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js"></script>
<!-- JS -->
<script src="{{ asset('js/script.js') }}"></script>


</body>
</html>

