@extends('layouts.frontend')
@section('content')
<!--=================================
Breadcrumb -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/"> <i class="fas fa-home"></i> </a></li>
		      <li class="breadcrumb-item"> <i class="fas fa-chevron-right"></i> <a href="/propertyList">Property List</a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i>
		  	<span>
			  Room {{ $propertyDetails->room }}, {{ $propertyDetails->property_eName }}, Block {{ $propertyDetails->block }}, Phase {{ $propertyDetails->phase->phase_eName }}, {{ $propertyDetails->phase->estate->estate_eName }}
			</span>
		  </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
Breadcrumb -->
<div class="wrapper">
  <!--=================================
  Property Detail -->
  <? 
	  // print_r("<pre>");
	  // print_r($propertyDetails->propertyFloorPlan);
    // print_r("</pre>");
    // exit;
  ?>
  <section class="pt-5">
    <div class="container">
      <div class="row">
       <div class="col-lg-4 mb-5 mb-lg-0 order-lg-2">
          <div class="sticky-top">
            <div class="mb-4">
              <h3>Room {{ $propertyDetails->room }}, {{ $propertyDetails->property_eName }}, Block {{ $propertyDetails->block }}, Phase {{ $propertyDetails->phase->phase_eName }}, {{ $propertyDetails->phase->estate->estate_eName }}</h3>
              <span class="d-block mb-3"><i class="fas fa-map-marker-alt fa-xs pr-2"></i>{{ $propertyDetails->phase->phase_e_street_name }}</span>


              @if ($propertyDetails->sales_price != 0)  
              <span class="price font-xll text-primary d-block">
                ${{ number_format($propertyDetails->sales_price,0,'.',',') }}
              </span>
              @endif
              
              @if ($propertyDetails->rent_price != 0)
              <span class="sub-price font-lg text-dark d-block">
                ${{ number_format($propertyDetails->rent_price,0,'.',',') }} / month
              </span>
              @endif

            </div>
            <div class="agent-contact-inner bg-dark p-4">
              <div class="d-flex align-items-center mb-4">
                <div class="agent-contact-avatar mr-3">
                  <img class="img-fluid rounded-circle avatar avatar-lg" src="{{asset('assets/agent/agent1.png')}}" alt="">
                </div>
                <div class="agent-contact-name">
                  <h6 class="text-white">{{ $propertyDetails->agent->agent_eName_firstName }} {{ $propertyDetails->agent->agent_eName_lastName }}</h6>
                  <span>{{ $propertyDetails->agent->agent_title }}</span>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <h6 class="text-primary border p-2 mb-0"><a href="#"><i class="fas fa-phone-volume text-white pr-2"></i>&nbsp;&nbsp;(852) {{ $propertyDetails->agent->agent_mobile }}</a></h6>
              </div>
              <div class="d-flex align-items-center">
                <h6 class="text-primary border p-2 mb-0"><a href="#"><i class="far fa-envelope text-white pr-2"></i> {{ $propertyDetails->agent->agent_email }}</a></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 order-lg-1">
          <div class="property-detail-gallery overflow-hidden">
            <ul class="nav nav-tabs nav-tabs-02 mb-4" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link shadow active" id="photo-tab" data-toggle="pill" href="#photo" role="tab" aria-controls="photo" aria-selected="true">Photo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link shadow" id="map-tab" data-toggle="pill" href="#map" role="tab" aria-controls="map" aria-selected="false">Map</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                <div class="slider-slick">
                  <div class="slider slider-for detail-big-car-gallery">                    
                    @foreach ($propertyDetails->propertyUnitPhoto as $photo)
                      <img class="img-fluid" style="height: 450px; width:auto;" src="{{ asset('assets/property/'.$photo->path) }}" alt="">  
                    @endforeach                    
                  </div>
                  <div class="slider slider-nav">
                    @foreach ($propertyDetails->propertyUnitPhoto as $photo)
                      <img class="img-fluid" style="" src="{{ asset('assets/property/'.$photo->path) }}" alt="">  
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                <div id="map2" class="embed-responsive embed-responsive-16by9"></div>
              </div>
              <div class="tab-pane fade" id="street-map-view" role="tabpanel" aria-labelledby="street-map-view-tab">
                <div id="street-view"></div>
              </div>
            </div>
          </div>          
          <div class="property-info mt-5">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Property details</h5>
              </div>
              <div class="col-sm-9">
                <div class="row mb-3">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled">
                      <li><b>Property ID:</b> {{$propertyDetails->property_id}} </li>
                      <li><b>Sales Size:</b> {{ $propertyDetails->actual_size }} Sq Ft (${{number_format($propertyDetails->sales_price/$propertyDetails->actual_size) }}/sq.ft)</li>
					            <li><b>Gross Size:</b> {{ $propertyDetails->building_size }} Sq Ft</li>                      
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled">
                      <li><b>Last remodel year:</b> {{ $propertyDetails->last_remodel_yr }} </li>
                      
                      <li><b>Property Status:</b>
                      For
                        @if ($propertyDetails->sales_price != 0)
                          Sales
                        @endif
                        @if ($propertyDetails->rent_price != 0)
                          Rent
                        @endif
                      </li>
                      @if ($propertyDetails->sales_price != 0)						
                      <li><b>Sales Price:</b> ${{ number_format($propertyDetails->sales_price,0,'.',',') }} </li>
                      @endif
                      
                      @if ($propertyDetails->rent_price != 0)					  	
                      <li><b>Rent Price:</b> ${{ number_format($propertyDetails->rent_price,0,'.',',') }} </li>
                      @endif

                      
                    </ul>
                  </div>
                </div>
                <h6 class="text-primary">Additional details</h6>
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">                      
                      <li><b>Bathrooms:</b>{{ $propertyDetails->num_of_bathroom }}</li>
                      <li><b>Bedrooms:</b>{{ $propertyDetails->num_of_bedroom }}</li>
                      <li><b>Kitchen:</b>{{ $propertyDetails->num_of_kitchen }}</li>                      
                      <li><b>Dining Rooms:</b>{{ $propertyDetails->num_of_dining_room }}</li>                      
                    </ul>
                  </div>
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                     <li><b>Living Rooms:</b>{{ $propertyDetails->num_of_living_room }}</li>
                      @if ($propertyDetails->num_of_carpark)
                        <li><b>Car Park:</b>{{ $propertyDetails->num_of_carpark }}</li>
                      @endif
                      @if ($propertyDetails->clubhouse)
                        <li><b>Clubhouse:</b>Yes</li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-info mt-5">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Mortgage details</h5>
              </div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="property-list list-unstyled mb-0">
                      <li><b>Deposit:</b> 30%</li>
                      <li><b>Last remodel year:</b> {{ $propertyDetails->last_remodel_yr }} </li>
                    </ul>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-description">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Description</h5>
              </div>
              <div class="col-sm-9">
                {{ $propertyDetails->property_desc }}
              </div>
            </div>
          </div>
          <hr class="mt-4 mb-4 mb-sm-5 mt-sm-5">
          <div class="property-floor-plans">
            <div class="row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <h5>Floor plans</h5>
              </div>
              <div class="col-sm-9">
                <div class="accordion-style-2" id="accordion">                
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="accordion-title mb-0">
                      <button class="btn btn-link d-flex ml-auto align-items-center" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">First Floor <i class="fas fa-chevron-down fa-xs"></i></button>
                      </h5>
                    </div>
                    <div id="collapseOne" class="collapse show accordion-content" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <p>Introspection is the trick. Understand what you want, why you want it and what it will do for you. This is a critical factor, and as such, is probably the most difficult step. For this reason, most people never!</p>
                        <img class="img-fluid" src="{{asset('app-assets/images/property/floor-plans-01.jpg')}}" alt="">
                      </div>
                    </div>
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
  Property Detail -->
  <br>
  <br>
</div>
@endsection



@section('javascript')
<script type="text/javascript">
  function initMap(lat, lng, property_id) {
    var uluru = {lat: lat, lng: lng};
    var map = new google.maps.Map(document.getElementById('map2'), {
      zoom: 16,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map,
      animation: google.maps.Animation.BOUNCE
    });
  }

  $(document).ready(function () {
    var propertyDetails = {!! json_encode($propertyDetails->toArray()) !!};
    initMap(propertyDetails.property_latitude, propertyDetails.property_longitude, propertyDetails.property_id);
  });
</script>
@endsection


@section('customjs')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX1rWSMcYwZ0EbzYu5C7ZgIUrKIEw4fEs"></script>
@endsection