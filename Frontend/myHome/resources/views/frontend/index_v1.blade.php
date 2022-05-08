@extends('layouts.frontend')
@section('content')
<!--=================================
banner -->
<section class="banner-map">
  <div class="map-canvas">
  </div>
</section>
<!--=================================
banner -->

<!--=================================
property search -->
<section class="property-search-field-top-02 position-reletive">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="property-search-field bg-white">
          <div class="property-search-item">
            <form class="form-row basic-select-wrapper">              
              <div class="form-group col-lg">
                <label>Status</label>
                <select class="form-control basic-select">
                  <option>Select Status</option>
                  <option>For Rent</option>
                  <option>For Sale</option>
                </select>
              </div>
              <div class="form-group d-flex col-lg-5">
                <div class="form-group-search">
                  <label>Location</label>
                  <div class="d-flex align-items-center"><i class="far fa-compass mr-1"></i><input class="form-control" type="search" placeholder="Search Location"></div>
                </div>
                <span class="d-flex align-items-center ml-3"><button class="btn btn-primary d-flex align-items-center" type="submit"><i class="fas fa-search mr-1"></i><span>Search</span></button></span>
              </div>
              <div class="form-group text-center col-lg">
                <a class="more-search p-0" data-toggle="collapse" href="#advanced-search" role="button" aria-expanded="false" aria-controls="advanced-search"> <span class="d-block pr-2 mb-1">Advanced search</span>
                  <i class="fas fa-angle-double-down"></i></a>
              </div>
              <div class="collapse advanced-search" id="advanced-search">
                <div class="card card-body">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label>Agent</label>
                      <select class="form-control basic-select">
                        <option>Select Agent</option>
                        <option>User Name 01</option>
                        <option>User Name 02</option>
                        <option>User Name 03</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Bad</label>
                      <select class="form-control basic-select">
                        <option>Select Bed</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Bath</label>
                      <select class="form-control basic-select">
                        <option>Select Bath</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Floor</label>
                      <select class="form-control basic-select">
                        <option>Select Floor</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label>Min Price</label>
                      <select class="form-control basic-select">
                        <option>Select Min Price</option>
                        <option>$5,000</option>
                        <option>$10,000</option>
                        <option>$15,000</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Max Price</label>
                      <select class="form-control basic-select">
                        <option>Select Max Price</option>
                        <option>$25,000</option>
                        <option>$35,000</option>
                        <option>$45,000</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Min Area  (sq ft)</label>
                      <input class="form-control" placeholder="Type (sq ft)">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Max Area  (sq ft)</label>
                      <input class="form-control" placeholder="Type (sq ft)">
                    </div>
                  </div>
                  <div class="form-row property-price-slider">
                    <div class="form-group col-md-12">
                      <label>Select Price Range</label>
                      <input type="text" id="property-price-slider" name="example_name" value="" />
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
property search -->

<!--=================================
Feature -->
<section class="space-ptb pt-5">
  <div class="container">
    <div class="row mt-4">
      <div class="col-md-4 mb-lg-0 mb-4">
        <div class="feature-info feature-info-round-icon text-center">
          <div class="feature-info-icon">
            <i class="flaticon-like"></i>
          </div>
          <div class="feature-info-content">
            <h4 class="mb-3 feature-info-title">Excellent reputation</h4>
            <p class="mb-0">Our comprehensive database of listings and market info give the most accurate view of the market and your home value.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-lg-0 mb-4">
        <div class="feature-info feature-info-round-icon text-center">
          <div class="feature-info-icon">
            <i class="flaticon-agent"></i>
          </div>
          <div class="feature-info-content">
            <h4 class="mb-3 feature-info-title">Best local agents</h4>
            <p class="mb-0">You are just minutes from joining with the best agents who are fired up about helping you Buy or sell.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-lg-0">
        <div class="feature-info feature-info-round-icon text-center">
          <div class="feature-info-icon">
            <i class="flaticon-like-1"></i>
          </div>
          <div class="feature-info-content">
            <h4 class="mb-3 feature-info-title">Peace of mind</h4>
            <p class="mb-0">Rest guaranteed that your agent and their expert team are handling every detail of your transaction from start to end.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Feature -->

<!--=================================
Featured properties-->
<section class="space-pb">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2>Newly listed properties</h2>
          <p>Find your dream home from our Newly added properties</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-9">
        <div class="property-item property-col-list">
          <div class="row no-gutters">
            <div class="col-lg-4 col-md-5">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="{{asset('app-assets/images/property/list/01.jpg')}}" alt="">
                <div class="property-lable">
                  <span class="badge badge-md badge-primary">Bungalow</span>
                  <span class="badge badge-md badge-info">Sale </span>
                </div>
                <span class="property-trending" title="trending"><i class="fas fa-bolt"></i></span>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="{{asset('app-assets/images/avatar/01.jpg')}}" alt="">
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
                      <h5 class="property-title"><a href="property-detail-style-01.html">Ample apartment at last floor </a></h5>
                      <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Virginia drive temple hills</span>
                      <span class="property-agent-date"><i class="far fa-clock fa-md"></i>10 days ago</span>
                    </div>
                    <div class="property-price">$150.00<span class="d-block"> / month</span> </div>
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
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-compare"><a data-toggle="tooltip" data-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                    <li class="property-favourites"><a data-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="property-item property-col-list">
          <div class="row no-gutters">
            <div class="col-lg-4 col-md-5">
              <div class="property-image bg-overlay-gradient-04">
                <img class="img-fluid" src="{{asset('app-assets/property/list/02.jpg')}}" alt="">
                <div class="property-lable">
                  <span class="badge badge-md badge-primary">Summer House</span>
                  <span class="badge badge-md badge-info">Hot </span>
                </div>
                <div class="property-agent">
                  <div class="property-agent-image">
                    <img class="img-fluid" src="{{asset('app-assets/images/avatar/02.jpg')}}" alt="">
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
                  <a href="#"><i class="fas fa-camera"></i> 12</a>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-md-7">
              <div class="property-details">
                <div class="property-details-inner">
                  <div class="property-details-inner-box">
                    <div class="property-details-inner-box-left">
                      <h5 class="property-title"><a href="property-detail-style-01.html">The citizen apartment 5th floor</a></h5>
                      <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>Border st. nicholasville, ky</span>
                      <span class="property-agent-date"><i class="far fa-clock fa-md"></i>6 months ago</span>
                    </div>
                    <div class="property-price">$250.00<span class="d-block"> / month</span> </div>
                  </div>
                  <ul class="property-info list-unstyled d-flex">
                    <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>2</span></li>
                    <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>3</span></li>
                    <li class="flex-fill property-m-sqft"><i class="far fa-square"></i>sqft<span>2,324m</span></li>
                  </ul>
                  <p class="mb-0 d-none d-block mt-3">Success isn��脌 really that difficult. There is a significant portion of the population here in North America, that actually.</p>
                </div>
                <div class="property-btn">
                  <a class="property-link" href="property-detail-style-01.html">See Details</a>
                  <ul class="property-listing-actions list-unstyled mb-0">
                    <li class="property-compare"><a data-toggle="tooltip" data-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                    <li class="property-favourites"><a data-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <a class="btn btn-link" href="/propertyList"><i class="fas fa-plus"></i>View All Listings</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mt-4 mt-lg-0">
        <div class="owl-carousel owl-nav-center" data-nav-dots="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
          <div class="item">
            <div class="testimonial-02 testimonial-02-small">
              <div class="testimonial-content">
                <p><i class="fas fa-quote-right quotes"></i>Oliver always had a smile and was so quick to answer and get the job done.  I'll definitely suggest you to anyone we know who is selling or wanting to purchase a home. He is the best!</p>
              </div>
              <div class="testimonial-author">
                <div class="testimonial-avatar avatar avatar-lg mr-3">
                  <img class="img-fluid rounded-circle" src="{{asset('app-assets/images/avatar/01.jpg')}}" alt="">
                </div>
                <div class="testimonial-name">
                  <h6 class="text-primary">Mikah Hargrove</h6>
                  <span>Hamilton Rd. Willoughby</span>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-02 testimonial-02-small">
              <div class="testimonial-content">
                <p><i class="fas fa-quote-right quotes"></i>Jennifer & Dave were both instructive and very valuable in making my decision. I would Surly recommend them to anyone looking for a hassle free and efficient real estate experience.</p>
              </div>
              <div class="testimonial-author">
                <div class="testimonial-avatar avatar avatar-lg mr-3">
                  <img class="img-fluid rounded-circle" src="{{asset('app-assets/images/avatar/02.jpg')}}" alt="">
                </div>
                <div class="testimonial-name">
                  <h6 class="text-primary">Joana williams</h6>
                  <span>Piper Drive Zion</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="p-4 bg-primary mt-4">
          <div class="counter counter-02 mb-4">
            <div class="counter-content">
              <span class="timer mb-1 text-white" data-to="2457" data-speed="10000">2457</span>
              <label class="mb-0 text-white">Property locations</label>
            </div>
          </div>
          <div class="counter counter-02 mb-4">
            <div class="counter-content">
              <span class="timer mb-1 text-white" data-to="1284" data-speed="10000">1284</span>
              <label class="mb-0 text-white">Property rent</label>
            </div>
          </div>
          <div class="counter counter-02">
            <div class="counter-content">
              <span class="timer mb-1 text-white" data-to="2365" data-speed="10000">2365</span>
              <label class="mb-0 text-white">Property sell</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Featured properties-->

<!--=================================
Looking to buy a new property-->
<section class="space-pb">
  <div class="space-ptb bg-holder bg-overlay-black-70" style="background-image: url({{asset('app-assets/images/bg/01.jpg')}});">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white display-sm-4">Looking to buy a new property?</h2>
          <p class="text-white mt-4">Success isn��脌 really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse when.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="bg-white p-4 p-md-5 position-relative mt-md-n5 z-index-1 border mt-5">
          <div class="row">
            <div class="col-sm-3 mb-4">
              <div class="counter counter-big text-center">
                <div class="counter-content">
                  <span class="timer mb-1 d-block text-primary" data-to="4561" data-speed="10000">4561</span>
                  <label class="mb-0">Beauty professionals</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 mb-4">
              <div class="counter counter-big text-center">
                <div class="counter-content">
                  <span class="timer mb-1 d-block text-primary" data-to="3256" data-speed="10000">3256</span>
                  <label class="mb-0">Cities Nationwide</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 mb-4">
              <div class="counter counter-big text-center">
                <div class="counter-content">
                  <span class="timer mb-1 d-block text-primary" data-to="2564" data-speed="10000">2564</span>
                  <label class="mb-0">Booked appointments</label>
                </div>
              </div>
            </div>
            <div class="col-sm-3 mb-4">
              <div class="counter counter-big text-center">
                <div class="counter-content">
                  <span class="timer mb-1 d-block text-primary" data-to="1452" data-speed="10000">1452</span>
                  <label class="mb-0">Property agent</label>
                </div>
              </div>
            </div>
            <div class="col-12 text-center mt-5">
              <a class="btn btn-primary" href="#"> Explorer all services</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
Looking to buy a new property-->

<!--=================================
about-->
<section class="space-pb">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="section-title mb-2">
          <img class="img-fluid mb-4" src="{{asset('app-assets/images/property/big-img-01.jpg')}}" alt="">
          <h2>Looking To Buy A New Property Or Sell An Existing One?</h2>
          <p class="mt-4">Success isn��脌 really that difficult. There is a significant portion of the population here in North America, that actually want and need success to be hard! Why? So they then have a built-in excuse when.</p>
        </div>
        <a class="btn btn-primary" href="#">Submit Property</a>
        <div class="our-clients mt-4">
          <div class="owl-carousel owl-nav-center" data-animateOut="fadeOut" data-nav-dots="false" data-items="3" data-md-items="2" data-sm-items="4" data-xs-items="3" data-xx-items="2" data-space="50">
            <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/amazon.svg')}}" alt="">
            </div>
             <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/flipkart.svg')}}" alt="">
            </div>
            <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/google.svg')}}" alt="">
            </div>
            <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/paypal.svg')}}" alt="">
            </div>
            <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/philips.svg')}}" alt="">
            </div>
            <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/slack.svg')}}" alt="">
            </div>
            <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/spotify.svg')}}" alt="">
            </div>
            <div class="item">
              <img class="img-fluid" src="{{asset('app-assets/images/client/stack-overflow.svg')}}" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <blockquote class="blockquote blockquote-quote mb-5">
          <i class="fas fa-quote-right"></i>
          <p>Without clarity, you send a very garbled message out to the Universe. We know that the Law of Attraction says that we will attract what we focus on, so if we don��脌 have clarity, we will attract confusion.</p>
        </blockquote>
        <img class="img-fluid" src="{{asset('app-assets/images/location/03.jpg')}}" alt="">
      </div>
    </div>
  </div>
</section>
<!--=================================
about-->

<!--=================================
call to action -->
<section class="py-5 bg-primary">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9">
        <h2 class="text-white mb-0">Looking to sell or rent your property?</h2>
      </div>
      <div class="col-lg-3 text-lg-right mt-3 mt-lg-0">
        <a class="btn btn-white" href="#">Get a free quote</a>
      </div>
    </div>
  </div>
</section>
<!--=================================
call to action -->
@endsection
