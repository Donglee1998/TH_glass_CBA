@extends('layouts.master')
@section('content')
<main>
    <div class="container">

      <!-- Breadcrums -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home icon-fa text-success"></i> Trang chủ</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
      <div class="row">

        <div class="col-md-12 main-news">
         <h2 class="text-center my-5 page-heading">Profile</h2>
        
      </div>
      <div class="container">
        <section id="content">
          <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div>
              <h3>Name: <input type="text" placeholder="" value="{{Auth::user()->name}}" name="name" /></h3>
              
            </div>
            <div>
              <h3>Email: <input type="text" placeholder="" value="{{Auth::user()->email}}" name="email" /></h3>
            </div>
            <div style="text-align: left">
              <h3>Avatar: <img style="width: 200px" src="{{ asset('uploads/'.Auth::user()->avatar) }}"></h3>
              <h3>Change Avatar: <input type="file" name="avatar"></h3>
            </div>
            <div>
              <input type="submit" value="Register" />
              <a href="{{ route('change-password') }}">Change Password</a>
            </div>
          </form><!-- form -->
          
        </section><!-- content -->
      </div><!-- container -->

     
    </div>
  </div>
</main>
@endsection