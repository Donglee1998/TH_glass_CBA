@extends('layouts.master')
@section('content')

<main>
    <div class="container">
      <!-- Breadcrums -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('contact')}}"><i class="fas fa-home icon-fa"></i> Trang chủ</a></li>
          <li class="breadcrumb-item active">Contact</li>
        </ol>
      </nav>

      <section class="my-5">
        <!-- Section heading -->
        <h2 class="text-center my-5 page-heading ">Liên hệ và góp ý</h2>
        <!-- Section description -->
        <div class="row">
          <div class="col-lg-5 mb-lg-0 mb-4">
            <!-- Form with header -->
            <div class="card">
              <div class="card-body">
                <div class="form-header blue accent-1">
                  <h4 class="mt-2">Hãy gửi tin nhắn cho chúng tôi:</h4>
                </div>

                <form>
                  <div class="input-box">
                    <input type="text" name="name" id="name">
                    <label class="form__text" for="name"><i class="far fa-file-alt"></i> Họ tên</label>
                  </div>

                  <div class="input-box">
                    <input type="email" name="email" id="email">
                    <label class="form__text" for="email"><i class="far fa-envelope"></i> Email</label>
                  </div>
                  <div class="input-box">
                    <textarea name="note" id="note" cols="50" rows="7"></textarea>
                    <label class="form__text" for="note"><i class="far fa-clipboard"></i> Ghi chú</label>
                  </div>

                  <div class="text-center">
                    <input id="form-submit" type="submit" value="Gửi">
                  </div>
                </form>

              </div>
            </div>
            <!-- Form with header -->
          </div>

          <div class="col-lg-7">
            <!--Google map-->
            <div id="map-container-section" class="z-depth-1-half map-container-section mb-4 gg-map" style="height: 350px">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.84420430438!2d105.75608421424545!3d21.038918892808805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134549556c63033%3A0x88c4d136db228b5!2zMSBOZ8O1IDE0OCBQaMO6YyBEaeG7hW4sIEPhuqd1IERp4buFbiwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1568881438089!5m2!1svi!2s" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
           </div>
           <!-- Buttons-->
           <div class="row text-center">
            <div class="col-md-4">
              <a class="btn-floating blue accent-1">
                <i class="fas fa-map-marker-alt fa-2x icon-fa"></i>
              </a>
              <p>Số 1, ngõ 148 Phúc Diễn</p>
              <p class="mb-md-0">Nam Từ Liêm, Hà Nội</p>
            </div>
            <div class="col-md-4">
              <a class="btn-floating blue accent-1">
                <i class="fas fa-phone fa-2x icon-fa"></i>
              </a>
              <p>0973xxxxxxxx</p>
              <p class="mb-md-0">T2 - CN, 9:00-20:00</p>
            </div>
            <div class="col-md-4">
              <a class="btn-floating blue accent-1">
                <i class="fas fa-envelope fa-2x icon-fa"></i>
              </a>
              <p>chailohu@gmail.com</p>
              <p class="mb-0">chailohu@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
@endsection