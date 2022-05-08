@extends('layouts.frontend')
@section('content')
<!--=================================
banner -->
<section class="banner banner-property">
  <div class="owl-carousel owl-nav-top-right" data-animateOut="fadeOut" data-nav-arrow="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
    @for ($i = 0; $i < 2; $i++)       
    <div class="item">
      <div class="property-offer">
        <div class="property-offer-item"> 
          <div class="property-offer-image bg-holder" style="background: url('{{ asset('assets/property/'.$propertyData[$i]->propertyUnitPhoto[rand (0,(sizeof($propertyData[$i]->propertyUnitPhoto)-1))]->path) }}'); background-repeat: no-repeat; background-position: center; background-size: cover;">
            <div class="container">      
              <div class="row justify-content-end">
                <div class="col-lg-5 col-md-8 col-sm-12">
                  <div class="property-details">
                    <div class="property-details-inner">                                        
                      <h5 class="property-title" style="white-space: normal;">
                        <a href="/property/@php $propertyData[$i]->property_id @endphp">                        
                        @php
                          echo 'Rm '.$propertyData[$i]->room.','.$propertyData[$i]->property_eName.', Bk '.$propertyData[$i]->block.', Phase '.$propertyData[$i]->phase->phase_eName.','.$propertyData[$i]->phase->estate->estate_eName
                        @endphp
                        </a>
                      </h5>
                      <span class="property-address">
                        <i class="fas fa-map-marker-alt fa-xs"></i>
                        {{ $propertyData[$i]->phase->phase_e_street_name }}
                      </span>
                      <span class="property-agent-date">
                        <i class="far fa-clock fa-md"></i>
                        @php
                          $diff = str_replace("-","",round((strtotime($propertyData[$i]->created_at) - time())));

                          $years = floor($diff / (365*60*60*24));
                          $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
                          $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                          $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);  
                          $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  

                          if ($years >= 1) {
                            echo $years." years ago";
                          }else if ($months >= 1) {
                            echo $months." months ago";                            
                          }else if ($days >= 1) {
                            echo $days." day ago";
                          }else if ($hours >= 1) {
                            echo $hours." hours ago";
                          }else if ($minutes >= 1) {
                            echo $minutes." mins ago";
                          }else if ($seconds >= 1) {
                            echo $seconds." seconds ago";
                          }
                        @endphp
                      </span>
                      <p class="mb-0 d-block mt-3">{{ $propertyData[$i]->property_desc }}</p>

                      @if ($propertyData[$i]->sales_price != 0)
                        <div class="property-price">  
                          ${{ number_format($propertyData[$i]->sales_price,0,'.',',') }}
                        </div>
                      @endif


                      <ul class="property-info list-unstyled d-flex">
                        <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>{{ $propertyData[$i]->num_of_bedroom }}</span></li>
                        <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>{{ $propertyData[$i]->num_of_bathroom }}</span></li>
                        <li class="flex-fill property-m-sqft"><i class="fas fa-balance-scale"></i>Saleable<span>{{ number_format($propertyData[$i]->actual_size,0,'.',',') }}</span></li>
                        <li class="flex-fill property-m-sqft"><i class="fas fa-sign"></i>Gross<span>{{ number_format($propertyData[$i]->building_size,0,'.',',') }}</span></li>
                      </ul>
                    </div>
                    <div class="property-btn">
                      <a class="property-link" href="/property/{{ $propertyData[$i]->property_id }}">See Details</a>
                      <ul class="property-listing-actions list-unstyled mb-0">
                        <!-- <li class="property-compare"><a data-toggle="tooltip" data-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                        <li class="property-favourites"><a data-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li> -->
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endfor
  </div>
</section>
<!--=================================
banner -->



<!--=================================
  Feature -->
  <section class="space-ptb bg-holder-bottom building-space" style="background-image: url(assets/img/building-bg.png);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-9">
        <div class="section-title mb-0">
          <h2>Plenty of reasons to choose us</h2>
          <p>Our agency has many specialized areas, but our CUSTOMERS are our real specialty.</p>
        </div>
      </div>
      <div class="col-lg-3 text-lg-right">
        <a class="btn btn-primary" href="/aboutus">More about us </a>
      </div>
    </div>
    <div class="row no-gutters mt-4">
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
    <div class="row justify-content-center mt-5">
      <div class="col-lg-7 text-center">
        <p class="mb-4">Ten years and thousands of home buyers have turned to Real Villa to find their dream home. We offer a comprehensive list of for-sale properties, as well as the knowledge and tools to make informed real estate decisions. Today, more than ever, Real Villa is the home of home Search.</p>
        <!-- <div class="popup-video">
          <a class="popup-icon popup-youtube" href="https://www.youtube.com/watch?v=LgvseYYhqU0"> <i class="flaticon-play-button"></i> </a>
        </div> -->
      </div>
    </div>
  </div>
</section>
  <!--=================================
  Feature -->

<!--=================================
Featured properties-->
<section>
  <div class="container-fluid container-space">
    <div class="row">
      <div class="col-8">
        <div class="section-title">
          <h2>Newly listed properties</h2>
          <p>Find your dream home from our Newly added properties</p>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-12">
      <div class="owl-carousel owl-nav-top-left" data-nav-arrow="true" data-items="4" data-md-items="2" data-sm-items="2" data-xs-items="1" data-xx-items="1" data-space="30">
        @for ($i = 0; $i < sizeof($propertyData); $i++)
        <div class="item">
          <div class="property-item">
            <div class="property-image bg-overlay-gradient-04">
              <img class="img-fluid" style="width:403px; height: 300px" src="{{ asset('assets/property/'.$propertyData[$i]->propertyUnitPhoto[rand (0,(sizeof($propertyData[$i]->propertyUnitPhoto)-1))]->path) }}" alt="">
              <div class="property-lable">
                @if ($propertyData[$i]->sales_price != 0)
                <span class="badge badge-md badge-primary">Sale</span>
                @endif

                @if ($propertyData[$i]->rent_price != 0)
                  <span class="badge badge-md badge-warning">Rent</span>
                @endif
              </div>              
              <!-- <div class="property-agent">
                <div class="property-agent-image">
                  <img class="img-fluid" src="" alt="">
                </div>
                <div class="property-agent-info">
                  <a class="property-agent-name" href="#">{{-- $propertyData[$i]->agent_eName_firstName --}} {{-- $propertyData[$i]->agent_eName_lastName --}}</a>
                  <span class="d-block">{{-- $propertyData[$i]->agent_title --}}</span>
                  <ul class="property-agent-contact list-unstyled">
                    <li><a href="tel:{{$propertyData[$i]->agent_mobile}}"><i class="fas fa-mobile-alt"></i> </a></li>
                    <li><a href="mailto:{{$propertyData[$i]->agent_email}}"><i class="fas fa-envelope"></i> </a></li>
                  </ul>
                </div>
              </div> -->
              <!-- <div class="property-agent-popup">
                <a href="#"><i class="fas fa-camera"></i> {{ sizeof($propertyData[$i]->propertyPhoto) }}</a>
              </div> -->
            </div>
            <div class="property-details">
              <div class="property-details-inner">
                <h5 class="property-title"  style="white-space: normal;"><a href="/property/{{ $propertyData[$i]->property_id }}">Rm {{ $propertyData[$i]->room }}, {{ $propertyData[$i]->property_eName }}, Bk {{ $propertyData[$i]->block }}, Phase {{ $propertyData[$i]->phase->phase_eName }}, {{ $propertyData[$i]->phase->estate->estate_eName }}</a></h5>
                <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{ $propertyData[$i]->phase->phase_e_street_name }}</span>
                <span class="property-agent-date">
                  <i class="far fa-clock fa-md"></i>
                  @php
                    $diff = str_replace("-","",round((strtotime($propertyData[$i]->created_at) - time())));

                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
                    $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                    $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);  
                    $seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  

                    if ($years >= 1) {
                      echo $years." years ago";
                    }else if ($months >= 1) {
                      echo $months." months ago";                            
                    }else if ($days >= 1) {
                      echo $days." day ago";
                    }else if ($hours >= 1) {
                      echo $hours." hours ago";
                    }else if ($minutes >= 1) {
                      echo $minutes." mins ago";
                    }else if ($seconds >= 1) {
                      echo $seconds." seconds ago";
                    }
                  @endphp
                </span>
                @if ($propertyData[$i]->sales_price != 0)
                  <div class="property-price">  
                    ${{ number_format($propertyData[$i]->sales_price,0,'.',',') }}
                  </div>
                @endif
                <ul class="property-info list-unstyled d-flex">
                  <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>{{ $propertyData[$i]->num_of_bedroom }}</span></li>
                  <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>{{ $propertyData[$i]->num_of_bathroom }}</span></li>
                  <li class="flex-fill property-m-sqft"><i class="fas fa-balance-scale"></i>Saleable<span>{{ number_format($propertyData[$i]->actual_size,0,'.',',') }}</span></li>
                   <!--<li class="flex-fill property-m-sqft"><i class="fas fa-sign"></i>Gross<span>{{ number_format($propertyData[$i]->building_size,0,'.',',') }}</span></li> -->
                </ul>
              </div>
              <div class="property-btn">
              <a class="property-link" href="/property/{{ $propertyData[$i]->property_id }}">See Details</a>
                <ul class="property-listing-actions list-unstyled mb-0">
                  <!-- <li class="property-compare"><a data-toggle="tooltip" data-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li>
                  <li class="property-favourites"><a data-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
        @endfor
      </div>
      </div>
      <div class="col-12 text-center mt-4">
        <a class="btn btn-link" href="/propertyList"><i class="fas fa-plus"></i>View All Listings</a>
      </div>
    </div>
  </div>
</section>
<!--=================================
Featured properties-->


<!--=================================
about-->
<section class="space-ptb bg-holder bg-overlay-black-70" style="background-image: url(images/bg/01.jpg);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <div class="section-title">
          <span class="text-primary font-weight-bold d-block mb-3">Buy or sell</span>
          <h2 class="text-white">Looking to buy a new property or sell an existing one? Real Villa provides an excellent solution!</h2>
        </div>
        <!-- <a class="btn btn-primary mb-2 mb-sm-0" href="#">Submit Property</a> -->
        <a class="btn btn-primary mb-2 mb-sm-0" href="/propertyList">Browse Properties</a>
      </div>
    </div>
  </div>
</section>
<!--=================================
about-->


<!--=================================
testimonial -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="section-title">
          <h2>Testimonials</h2>
        </div>
        <div class="owl-carousel owl-nav-top-left" data-nav-arrow="true" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1" data-space="0">
          <div class="item">
            <div class="testimonial-02">
              <div class="testimonial-content">
                <p><i class="fas fa-quote-right quotes"></i>Oliver always had a smile and was so quick to answer and get the job done.  I'll definitely suggest you to anyone we know who is selling or wanting to purchase a home. He is the best!</p>
              </div>
              <div class="testimonial-author">
                <div class="testimonial-avatar avatar avatar-lg mr-3">
                  <img class="img-fluid rounded-circle" src="images/avatar/01.jpg" alt="">
                </div>
                <div class="testimonial-name">
                  <h6 class="text-primary mb-1">Michael Bean</h6>
                  <span>Hamilton Rd. Willoughby</span>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="testimonial-02">
              <div class="testimonial-content">
                <p><i class="fas fa-quote-right quotes"></i>Jennifer & Dave were both instructive and very valuable in making my decision. I would Surly recommend them to anyone looking for a hassle free and efficient real estate experience.</p>
              </div>
              <div class="testimonial-author">
                <div class="testimonial-avatar avatar avatar-lg mr-3">
                  <img class="img-fluid rounded-circle" src="images/avatar/02.jpg" alt="">
                </div>
                <div class="testimonial-name">
                  <h6 class="text-primary mb-1">Isabelle</h6>
                  <span>West Division Street</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mt-5 mt-md-0">
        <div class="section-title">
          <h2>Frequently asked questions</h2>
        </div>
        <div class="accordion" id="accordion">
          <div class="accordion-item">
            <div class="accordion-title" id="accordion-title-one">
              <a href="#" data-toggle="collapse" data-target="#accordion-one" aria-expanded="true" aria-controls="accordion-one">01. Who pays the Realtor fees when buying a home?</a>
            </div>
            <div id="accordion-one" class="collapse show" aria-labelledby="accordion-title-one" data-parent="#accordion">
              <div class="accordion-content">Without clarity, you send a very garbled message out to the Universe. We know that the Law of Attraction says that we will attract what we focus on, so if we don��脌 have clarity, we will attract confusion.</div>
            </div>
          </div>
          <div class="accordion-item">
            <div class="accordion-title" id="accordion-title-tow">
              <a href="#" class="collapsed" data-toggle="collapse" data-target="#accordion-two" aria-expanded="false" aria-controls="accordion-two">02. How is the neighborhood/area?</a>
            </div>
            <div id="accordion-two" class="collapse" aria-labelledby="accordion-title-tow" data-parent="#accordion">
              <div class="accordion-content">The sad thing is the majority of people have no clue about what they truly want. They have no clarity. When asked the question, responses will be superficial at best, and at worst, will be what someone .</div>
            </div>
          </div>
          <div class="accordion-item">
            <div class="accordion-title" id="accordion-title-three">
              <a href="#" class="collapsed" data-toggle="collapse" data-target="#accordion-three" aria-expanded="false" aria-controls="accordion-three">03. What are the average utility bills?</a>
            </div>
            <div id="accordion-three" class="collapse" aria-labelledby="accordion-title-three" data-parent="#accordion">
              <div class="accordion-content">So how do we get clarity? Simply by asking ourselves lots of questions: What do I really want? What does success look like to me? Why do I want a particular thing? How will this achievement change.</div>
            </div>
          </div>
        </div>
        <div class="mt-4">
          <div class="d-flex align-items-center">
            <span class="d-block mr-3 text-dark"><b>Try our AI</b></span>
            <i class="fas fa-phone bg-primary p-3 rounded-circle text-white fa-flip-horizontal"></i>
            <h6 class="pl-3 mb-0 text-primary">(852) 345-6789</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
testimonial -->

@endsection
