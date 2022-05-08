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
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> About us </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
breadcrumb -->

<!--=================================
about -->
<section class="space-ptb bg-holder" style="background-image: url(images/pattern-bg.jpg);">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-9">
        <div class="text-center">
          <h1 class="text-primary mb-4">We are changing the Real estate industry with progression and passion.</h1>
          <p class="px-sm-5 mb-4 lead font-weight-normal">We attempt to be the leading self-governing estate agency in the locations we cover, offering an entirely personal and dedicated service. </p>          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="section-title text-center">
          <h2>Plenty of reasons to choose us</h2>
          <p>Our agency has many specialized areas, but our CUSTOMERS are our real specialty.</p>
        </div>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-like"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Excellent reputation</h6>
            <p class="mb-0">Our comprehensive database of listings and market info give the most accurate view of the market and your home value.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-agent"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Best local agents</h6>
            <p class="mb-0">You are just minutes from joining with the best agents who are fired up about helping you Buy or sell.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-like-1"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Peace of mind</h6>
            <p class="mb-0">Rest guaranteed that your agent and their expert team are handling every detail of your transaction from start to end.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="feature-info h-100">
          <div class="feature-info-icon">
            <i class="flaticon-house-1"></i>
          </div>
          <div class="feature-info-content">
            <h6 class="mb-3 feature-info-title">Tons of options</h6>
            <p class="mb-0">Discover a place you’ll love to live in. Choose from our vast inventory and choose your desired house.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
about -->
@endsection
