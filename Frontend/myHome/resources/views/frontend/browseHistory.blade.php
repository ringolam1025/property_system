@extends('layouts.frontend')
@section('content')
<!--=================================
breadcrumb -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/profile"> <i class="fas fa-home"></i> </a></li>         
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span>My properties</span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
breadcrumb -->

<!--=================================
my-properties -->
<section class="space-ptb">
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
          <h2>My properties</h2>
        </div>
        <div class="property-item property-col-list mt-4">
          <div class="row no-gutters">
            <div class="col-lg-4 col-md-5">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="{{asset('assets/property/1/p1.jpg')}}" alt="">
                <div class="property-lable">
                  <span class="badge badge-md badge-info">Sale </span>
                </div>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="{{asset('assets/agent/agent1.png')}}" alt=""> 
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Alice Williams</a>
                    <span class="d-block">Company Agent</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 04</a>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-7">
              <div class="property-details">
                <div class="property-details-inner">
                  <div class="property-details-inner-box">
                    <div class="property-details-inner-box-left">
                      <h5 class="property-title"><a href="property-detail-style-01.html">Room G, High Floor, Block 10, Phase Nan Fung Sun Chuen, Nan Fung Sun Chuen</a></h5>
                      <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>32-40 Greig Road</span>
                      <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                    </div>
                    <div class="property-price">$15,674,384</div>
                  </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li>
                  </ul>
                  <p class="mb-0 d-none d-block mt-3">For those of you who are serious about having more, doing more, giving more and being with some understanding.</p>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="property-item property-col-list mt-4">
          <div class="row no-gutters">
            <div class="col-lg-4 col-md-5">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="{{asset('assets/property/1/p1.jpg')}}" alt="">
                <div class="property-lable">
                  <span class="badge badge-md badge-info">Sale </span>
                </div>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="{{asset('assets/agent/agent1.png')}}" alt=""> 
                  </div>
                  <div class="property-agent-info">
                    <a class="property-agent-name" href="#">Alice Williams</a>
                    <span class="d-block">Company Agent</span>
                    <ul class="property-agent-contact list-unstyled">
                      <li><a href="#"><i class="fas fa-mobile-alt"></i> </a></li>
                      <li><a href="#"><i class="fas fa-envelope"></i> </a></li>
                    </ul>
                  </div>
                </div>
                <div class="property-agent-popup">
                  <a href="#"><i class="fas fa-camera"></i> 04</a>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-7">
              <div class="property-details">
                <div class="property-details-inner">
                  <div class="property-details-inner-box">
                    <div class="property-details-inner-box-left">
                      <h5 class="property-title"><a href="property-detail-style-01.html">Room G, High Floor, Block 10, Phase Nan Fung Sun Chuen, Nan Fung Sun Chuen</a></h5>
                      <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>32-40 Greig Road</span>
                      <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                    </div>
                    <div class="property-price">$15,674,384</div>
                  </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>1</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>2</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>145m</span></li>
                  </ul>
                  <p class="mb-0 d-none d-block mt-3">For those of you who are serious about having more, doing more, giving more and being with some understanding.</p>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
my-properties -->
@endsection
