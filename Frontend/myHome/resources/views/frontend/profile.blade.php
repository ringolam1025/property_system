@extends('layouts.frontend')
@section('content')
<!--=================================
breadcrumb -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/"> <i class="fas fa-home"></i> </a></li>          
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>My profile</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
breadcrumb -->

<!--=================================
My profile --> 
<section>
  <div class="container">
    <div class="row">
      <div class="col-12 mb-5">
        <div class="profile-sidebar bg-holder bg-overlay-black-70" style="background-image: {{asset('assets/property/5/p3.jpg')}};">
          <div class="d-sm-flex align-items-center position-relative">
            <div class="profile-avatar">
              <img class="img-fluid  rounded-circle" src="{{asset('assets/img/avatars/8.jpg')}}" alt="">
            </div>
            <div class="ml-sm-4">
              <h4 class="text-white">Brian Atlas</h4>
              <b class="text-white">brianatlas@gmail.com</b>
            </div>            
          </div>
          <div class="profile-nav">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link active" href="profile"><i class="far fa-user"></i> Edit Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="history"><i class="far fa-bell"></i>My History</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="section-title d-flex align-items-center">
          <h2>Edit profile </h2>
          <!-- <span class="ml-auto">Joined Mar 18, 2019</span> -->
        </div>
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>User name</label>
              <input type="text" class="form-control" value="Brian Atlas">
            </div>
            <div class="form-group col-md-6">
              <label>Email address</label>
              <input type="text" class="form-control" value="brianatlas@gmail.com">
            </div>
            <div class="form-group col-md-6">
              <label>Phone number</label>
              <input type="text" class="form-control" value="(852) 9345-6789">
            </div>            
            <div class="form-group col-md-6">
              <label>Location</label>
              <input type="text" class="form-control" value="Tin Shui Wai">
            </div>
            <div class="form-group col-md-6">
              <div class="d-flex align-items-center">
                <label>Password</label>
                <a class="ml-auto mb-2" href="#">Edit</a>
              </div>
              <input type="password" class="form-control" value="1234567892">
            </div>
            <div class="form-group col-md-12">
              <label>About Me</label>
              <textarea class="form-control" rows="4" value="About me"></textarea>
            </div>
            <div class="col-md-12">
              <a class="btn btn-primary" href="#">Save Changes</a>
            </div>
          </div>
        </form>              
      </div>
    </div>
  </div>
  <br>
  <br>
</section>
<!--=================================
My profile -->

@endsection