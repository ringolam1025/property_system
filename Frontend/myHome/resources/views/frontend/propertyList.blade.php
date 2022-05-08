@extends('layouts.frontend')
@section('content')
<!--=================================
map full -->
<section class="bg-white half-map">
  <div class="container-fluid">
    <div class="row ">
      <div class="col-lg-6">
        <div class="half-map-full">
         <div class="map-canvas h-100vh">
           </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="scrollbar scroll_dark h-100vh">
          <div class="property-search-field bg-white">
          <div class="property-search-item">
            <form class="form-row basic-select-wrapper" method="POST" action="/propertyList" id="search">
              {{ csrf_field() }}
              <div class="form-group section-title col-xl col-lg-6">
                <h4><span class="text-primary">{{ $propertyData->total() }}</span><br>Result</h4>
              </div>
              <div class="form-group col-xl col-lg-6">
               <label>Sort by</label>
               <select class="form-control basic-select" id="propertyList_sortBy" name="sortBy">
                <option value="dateDesc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='dateDesc'?'selected':'') ?>>Date New to Old</option>
                <option value="dateAsc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='dateAsc'?'selected':'') ?>>Date Old to New</option>
                <option value="SalesPriceDesc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='SalesPriceDesc'?'selected':'') ?>>Sales Price High to Low</option>
                <option value="SalesPriceAsc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='SalesPriceAsc'?'selected':'') ?>>Sales Price Low to High</option>
                <option value="RentPriceDesc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='RentPriceDesc'?'selected':'') ?>>Rent Price High to Low</option>
                <option value="RentPriceAsc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='RentPriceAsc'?'selected':'') ?>>Rent Price Low to High</option>
              </select>
              </div> 
              <div class="form-group d-flex col-xl-5 col-lg-8">
                <div class="form-group-search">
                  <label>Keywords</label>
                  <div class="d-flex align-items-center"><input class="form-control" placeholder="Keywords" name="keywords" value="<?= (isset($searchCond['keywords']) && $searchCond['keywords']!=''?$searchCond['keywords']:'') ?>"></div>
                </div>
                <span class="align-items-center ml-3 d-none d-md-block"><button class="btn btn-primary d-flex align-items-center p-3" type="submit"><i class="fas fa-search"></i></button></span>
              </div>              
              <div class="form-group text-center col-xl col-lg-4">
                <div class="d-flex justify-content-center d-md-inline-block">
                  <a class="more-search p-0" data-toggle="collapse" href="#advanced-search" role="button" aria-expanded="false" aria-controls="advanced-search"> <span class="d-block pr-2 mb-1">Advanced search</span>
                  <i class="fas fa-angle-double-down"></i></a>
                </div>
              </div>
              <div class="collapse advanced-search" id="advanced-search">
                <div class="card card-body">
                  <div class="form-row">
                    <div class="form-group col-xl col-lg-4">
                      <label>Status</label>
                      <select class="form-control basic-select" name="tranType">
                        <option value="" <?= (isset($searchCond['tranType']) && $searchCond['tranType']==''?'selected':'') ?>>Type</option>
                        <option value="forRent" <?= (isset($searchCond['tranType']) && $searchCond['tranType']=='forRent'?'selected':'') ?>>For Rent</option>
                        <option value="forSale" <?= (isset($searchCond['tranType']) && $searchCond['tranType']=='forSale'?'selected':'') ?>>For Sale</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Bedrooms</label>
                      <select class="form-control basic-select" name="bedroom">
                        <option value="" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']==''?'selected':'') ?>>Bedrooms</option>
                        <option value="1" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='1'?'selected':'') ?>>1</option>
                        <option value="2" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='2'?'selected':'') ?>>2</option>
                        <option value="3" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='3'?'selected':'') ?>>3</option>
                        <option value="4" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='4'?'selected':'') ?>>4 or above</option>
                      </select>
                    </div>
                    <div class="form-group col-lg-4">
                      <label>Bathrooms</label>
                      <select class="form-control basic-select" name="bathroom">
                        <option value="" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']==''?'selected':'') ?>>Bathrooms</option>
                        <option value="1" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='1'?'selected':'') ?>>1</option>
                        <option value="2" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='2'?'selected':'') ?>>2</option>
                        <option value="3" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='3'?'selected':'') ?>>3</option>
                        <option value="4" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='4'?'selected':'') ?>>4 or above</option>
                      </select>
                    </div>
                    </div>
                  <div class="form-row">
                    <div class="form-group buildingArea-slider col-lg-6">
                      <label>Building Area</label>
                      <input type="text" id="buildingArea-slider" name="buildingArea" value="<?= (isset($searchCond['buildingArea']) && $searchCond['buildingArea']!=''?$searchCond['buildingArea']:'') ?>" />
                    </div>
                    <div class="form-group salesArea-slider col-lg-6">
                      <label>Sales Area</label>
                      <input type="text" id="salesArea-slider" name="salesArea" value="<?= (isset($searchCond['salesArea']) && $searchCond['salesArea']!=''?$searchCond['salesArea']:'') ?>" />
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-lg-6 salesprice-slider ">
                      <label>Sales Price</label>
                      <input type="text" id="salesprice-slider" name="salesprice" value="<?= (isset($searchCond['salesprice']) && $searchCond['salesprice']==''?$searchCond['salesprice']:'') ?>" />
                    </div>
                    <div class="form-group col-lg-6 rentPrice-slider ">
                      <label>Rental Price</label>
                      <input type="text" id="rentPrice-slider" name="rentprice" value="<?= (isset($searchCond['rentprice']) && $searchCond['rentprice']==''?$searchCond['rentprice']:'') ?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-md-none btn-block btn-mobile  m-3">
                <button class="btn btn-primary btn-block align-items-center" type="submit"><i class="fas fa-search mr-1"></i><span>Search</span></button>
              </div>
            </form>
          </div>
          </div>
        @include('frontend.propertyListView')
        {!! $propertyData->links('layouts.includes.limit_links') !!}
        </div>
      </div>
    </div>
  </div>
</section>
<!--=================================
map full -->

<script src="{{asset('app-assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('app-assets/js/popper/popper.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap/bootstrap.min.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX1rWSMcYwZ0EbzYu5C7ZgIUrKIEw4fEs&callback=initMap"></script>

<script>
function formatSilderPrice (num) {
   return Math.abs(Number(num)) >= 1.0e+9 ? Math.abs(Number(num)) / 1.0e+9 + "B"
          : Math.abs(Number(num)) >= 1.0e+6 ? Math.abs(Number(num)) / 1.0e+6 + "M"
          : Math.abs(Number(num)) >= 1.0e+3 ? Math.abs(Number(num)) / 1.0e+3 + "K"
          : Math.abs(Number(num));
  }
// RingoJS
var placements = <?= $showInMap ?>;
$( document ).ready(function() {

  $("#propertyList_display").change(function(){  
    $( "#search" ).submit();
    // $.ajax({
    //     url: '/propertyList',
    //     method: 'GET',
    //     data: {
    //             _token:'<?= csrf_token() ?>',
    //             listing:this.value
    //           },
    //     success: function( response ){        
    //       $(".detailsProperty").html(response).show( "slow" );;
    //     }
    // });
  });

  $("#propertyList_sortBy").change(function(){  
    $( "#search" ).submit();
  });
  

  <? if (isset($searchCond['salesArea']) && $searchCond['salesArea']){ ?>
  if ($('.salesArea-slider').exists()) {
    var salesArea = '<?= $searchCond['salesArea'] ?>';
    salesArea = salesArea.split(";");
    $("#salesArea-slider").ionRangeSlider({
        type: "double",
        min: 300,
        max: 5000,
        from: salesArea[0],
        to: salesArea[1],
        postfix: "sqft",
        hide_min_max: true,
        hide_from_to: false,
      });
    }
  <? } ?>

  <? if (isset($searchCond['buildingArea']) && $searchCond['buildingArea']){ ?>
  if ($('.buildingArea-slider').exists()) {
      var buildingArea = '<?= $searchCond['buildingArea'] ?>';
      buildingArea = buildingArea.split(";");
      $("#buildingArea-slider").ionRangeSlider({
        type: "double",
        min: 300,
        max: 5000,
        from: buildingArea[0],
        to: buildingArea[1],
        postfix: "sqft",
        hide_min_max: true,
        hide_from_to: false,
      });
    }
  <? } ?>

  <? if (isset($searchCond['rentprice']) && $searchCond['rentprice']){ ?>
  if ($('.rentPrice-slider').exists()) {
      var rentprice = '<?= $searchCond['rentprice'] ?>';
      rentprice = rentprice.split(";");
      $("#rentPrice-slider").ionRangeSlider({
        type: "double",
        min: 10000,
        max: 50000,
        step: 1000,
        from: rentprice[0],
        to: rentprice[1],
        prefix: "$",
        hide_min_max: true,
        hide_from_to: false,
        prettify: formatSilderPrice,
      });
    }
  <? } ?>

  <? if (isset($searchCond['salesprice']) && $searchCond['salesprice']){ ?>
  if ($('.salesprice-slider').exists()) {
      var salesprice = '<?= $searchCond['salesprice'] ?>';      
      salesprice = salesprice.split(";");
      $("#salesprice-slider").ionRangeSlider({
        type: "double",
        min: 4000000,
        max: 100000000,
        step: 100000,
        from: salesprice[0],
        to: salesprice[1],
        prefix: "$",
        hide_min_max: true,
        hide_from_to: false,
        prettify: formatSilderPrice,
      });
    }
  <? } ?>

  
});
</script>

@endsection
