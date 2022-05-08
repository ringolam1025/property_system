@foreach ($propertyData as $property)
<div class="property-item property-col-list mt-4">
  <div class="row no-gutters">
    <div class="col-lg-4 col-md-5">
      <div class="property-image bg-overlay-gradient-04">
        <img class="img-fluid" src="{{asset('assets/property/'.$property->photo)}}" alt="">
        <div class="property-lable">
          @if ($property->sales_price != 0)
            <span class="badge badge-md badge-primary">Sale</span>
          @endif

          @if ($property->rent_price != 0)
            <span class="badge badge-md badge-warning">Rent</span>
          @endif
        </div>
        <div class="property-agent">
          <div class="property-agent-image">
            <img class="img-fluid" src="{{asset('assets/agent/agent1.png')}}" alt="">
          </div>
          <div class="property-agent-info">
            <a class="property-agent-name" href="#">{{-- $property->agent_eName_firstName --}} {{-- $property->agent_eName_lastName --}}</a>
            <span class="d-block">{{-- $property->agent_title --}}</span>
            <ul class="property-agent-contact list-unstyled">
              <li><a href="tel:{{$property->agent_mobile}}"><i class="fas fa-mobile-alt"></i> </a></li>
              <li><a href="mailto:{{$property->agent_email}}"><i class="fas fa-envelope"></i> </a></li>
            </ul>
          </div>
        </div>
        <div class="property-agent-popup">
          <a href="#"><i class="fas fa-camera"></i>04</a>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-7">
      <div class="property-details">
        <div class="property-details-inner">
          <div class="property-details-inner-box">
            <div class="property-details-inner-box-left" style="width: 400px;">
              <h6 class="property-title" style="white-space: normal;">
                <a href="/property/{{ $property->property_id }}">
                  Rm {{ $property->room }}, {{ $property->property_eName }}, Bk {{ $property->block }}, Phase {{ $property->phase_eName }}, {{ $property->estate_eName }}
                </a>
              </h6>
              <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i>{{ $property->phase_e_street_name }}</span>
              <span class="property-agent-date">
                <i class="far fa-clock fa-md"></i>
                <?
                  $diff = str_replace("-","",round((strtotime($property->created_at) - time())));

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
                ?>
                </span>
            </div>                    
            @if ($property->sales_price != 0)
              <div class="property-price">  
                ${{ number_format($property->sales_price,0,'.',',') }}
              </div>
            @endif

            @if ($property->rent_price != 0)
              <div class="property-price">                      
                ${{ number_format($property->rent_price,0,'.',',') }} /month
              <span class="d-block"></span>
            </div>
            @endif
          </div>
          <ul class="property-info list-unstyled d-flex">
            <li class="flex-fill property-bed"><i class="fas fa-bed"></i>Bed<span>{{ $property->num_of_bedroom }}</span></li>
            <li class="flex-fill property-bath"><i class="fas fa-bath"></i>Bath<span>{{ $property->num_of_bathroom }}</span></li>
            <li class="flex-fill property-m-sqft"><i class="fas fa-balance-scale"></i>Saleable(sqFT)<span>{{ number_format($property->actual_size,0,'.',',') }}</span></li>
            <li class="flex-fill property-m-sqft"><i class="fas fa-sign"></i>Gross(sqFT)<span>{{ number_format($property->building_size,0,'.',',') }}</span></li>
          </ul>
          <p class="mb-0 d-none d-block mt-3">{{
            $property->property_desc }}</p>
        </div>
        <div class="property-btn">
          <a class="property-link" href="/property/{{ $property->property_id }}">See Details</a>
          <ul class="property-listing-actions list-unstyled mb-0">
            <!-- <li class="property-compare"><a data-toggle="tooltip" data-placement="top" title="Compare" href="#"><i class="fas fa-exchange-alt"></i></a></li> -->
            <!-- <li class="property-favourites"><a data-toggle="tooltip" data-placement="top" title="Favourite" href="#"><i class="far fa-heart"></i></a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
