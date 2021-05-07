@extends('layouts.master')
@section('content')
<main>

    <div class="container">
      <div class="row">

        <div class="col-md-12 main-news">
         <h2 class="text-center my-5 page-heading">Change Password</h2>
        
      </div>
      @if ($errors->any())
    <div class="alert alert-danger" style="margin: auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('mess'))
        <div class="alert alert-danger" style="width: 40%; margin: auto auto">
            {{Session::get('mess')}}
        </div>
    @endif
      <div class="container">
        <section id="content">
          <form action="{{ route('change-password') }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div>
              <input type="password" name="old-password" placeholder="Enter password">
            <div>
            <div>
              <input type="password" name="password" placeholder="Enter new password">
            <div>
            <div>
              <input type="password" name="re_password" placeholder="Re new password">
            <div>  
            <div>
              <input type="submit" value="Change" />
              <a href="">Back to profile</a>
            </div>
          </form>
          
        </section>
      </div>

     
    </div>
  </div>
</main>
@endsection