@extends('layouts.frontend')

@section('content')
<!--=================================
property -->
<section class="property-map">
  <div class="map-canvas">
  </div>
</section>
<!--=================================
property -->

<!--=================================
breadcrumb -->
<div class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.html"> <i class="fas fa-home"></i> </a></li>
          <li class="breadcrumb-item active"> <i class="fas fa-chevron-right"></i> <span> Property List </span></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--=================================
breadcrumb -->
<!--=================================
Listing ??? grid view -->
<section class="space-ptb">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="section-title mb-3 mb-lg-4">
          <h2><span class="text-primary">{{ $propertyData->total() }}</span> Results</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="property-filter-tag">
          <ul class="list-unstyled">
            <!-- <li><a href="#">Residential <i class="fas fa-times-circle"></i> </a></li>
            <li><a class="filter-clear" href="#">Reset Search <i class="fas fa-redo-alt"></i> </a></li> -->
          </ul>
        </div>
      </div>
    </div>
    <?
      // if (isset($searchCond)){
      //   print_r($searchCond); 
      // }
    ?>
    <form method="POST" action="/propertyList" id="search">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-lg-3 mb-5 mb-lg-0">
        <div class="sidebar">
          <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Advanced filter</h6>
              <a class="ml-auto" data-toggle="collapse" href="#filter-property" role="button" aria-expanded="false" aria-controls="filter-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="filter-property">
                <div class="input-group mb-2 select-border">                  
                  <select class="form-control basic-select" name="tranType">
                    <option value="" <?= (isset($searchCond['tranType']) && $searchCond['tranType']==''?'selected':'') ?>>Type</option>
                    <option value="forRent" <?= (isset($searchCond['tranType']) && $searchCond['tranType']=='forRent'?'selected':'') ?>>For Rent</option>
                    <option value="forSale" <?= (isset($searchCond['tranType']) && $searchCond['tranType']=='forSale'?'selected':'') ?>>For Sale</option>
                  </select>
                </div>
                <div class="input-group mb-2 select-border">
                  <select class="form-control basic-select" name="bedroom">
                    <option value="" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']==''?'selected':'') ?>>Bedrooms</option>
                    <option value="1" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='1'?'selected':'') ?>>1</option>
                    <option value="2" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='2'?'selected':'') ?>>2</option>
                    <option value="3" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='3'?'selected':'') ?>>3</option>
                    <option value="4" <?= (isset($searchCond['bedroom']) && $searchCond['bedroom']=='4'?'selected':'') ?>>4 or above</option>
                  </select>
                </div>
                <div class="input-group mb-2 select-border">
                  <select class="form-control basic-select" name="bathroom">
                    <option value="" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']==''?'selected':'') ?>>Bathrooms</option>
                    <option value="1" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='1'?'selected':'') ?>>1</option>
                    <option value="2" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='2'?'selected':'') ?>>2</option>
                    <option value="3" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='3'?'selected':'') ?>>3</option>
                    <option value="4" <?= (isset($searchCond['bathroom']) && $searchCond['bathroom']=='4'?'selected':'') ?>>4 or above</option>
                  </select>
                </div>
                <div class="input-group mb-2">
                  <input class="form-control" placeholder="Keywords" name="keywords" value="<?= (isset($searchCond['keywords']) && $searchCond['keywords']!=''?$searchCond['keywords']:'') ?>">
                </div>
                <div class="form-group salesArea-slider mt-3">
                  <label>Sales Area</label>
                  <input type="text" id="salesArea-slider" name="salesArea" value="<?= (isset($searchCond['salesArea']) && $searchCond['salesArea']!=''?$searchCond['salesArea']:'') ?>" />
                </div>
                <div class="form-group buildingArea-slider mt-3">
                  <label>Building Area</label>
                  <input type="text" id="buildingArea-slider" name="buildingArea" value="<?= (isset($searchCond['buildingArea']) && $searchCond['buildingArea']!=''?$searchCond['buildingArea']:'') ?>" />
                </div>
                <div class="form-group salesprice-slider mt-3">
                  <label>Sales Price</label>
                  <input type="text" id="salesprice-slider" name="salesprice" value="<?= (isset($searchCond['salesprice']) && $searchCond['salesprice']==''?$searchCond['salesprice']:'') ?>" />
                </div>
                <div class="form-group rentPrice-slider mt-3">
                  <label>Rental Price</label>
                  <input type="text" id="rentPrice-slider" name="rentprice" value="<?= (isset($searchCond['rentprice']) && $searchCond['rentprice']==''?$searchCond['rentprice']:'') ?>" />
                </div>
                <div class="input-group mb-2">
                  <button class="btn btn-primary btn-block align-items-center" type="submit"><i class="fas fa-filter mr-1"></i><span>Filter</span></button>
                </div>
            </div>
          </div>
          <!-- <div class="widget">
            <div class="widget-title widget-collapse">
              <h6>Status of property</h6>
              <a class="ml-auto" data-toggle="collapse" href="#status-property" role="button" aria-expanded="false" aria-controls="status-property"> <i class="fas fa-chevron-down"></i> </a>
            </div>
            <div class="collapse show" id="status-property">
              <ul class="list-unstyled mb-0 pt-3">
                <li><a href="#">For rent<span class="ml-auto">()</span></a></li>
                <li><a href="#">For Sale<span class="ml-auto">()</span></a></li>
              </ul>
            </div>
          </div> -->
          <div class="widget">
            <div class="widget-title">
              <h6>Mortgage calculator</h6>
            </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                </div>
                <input type="text" class="form-control" placeholder="Total Amount">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Down Payment">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-percent"></i></div>
                </div>
                <input type="text" class="form-control" placeholder="Interest Rate">
              </div>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="far fa-clock"></i></div>
                </div>
                <input type="text" class="form-control" placeholder="Loan Term (Years)">
              </div>
              <div class="input-group mb-3 select-border">
                <select class="form-control basic-select">
                  <option>Monthly</option>
                  <option>Weekly</option>
                  <option>Yearly</option>
                </select>
              </div>
              <a class="btn btn-primary btn-block" href="#">Calculate</a>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="property-filter d-sm-flex">
          <ul class="property-short list-unstyled d-sm-flex mb-0">
            <li>
              <div class="form-inline">
                <div class="form-group d-lg-flex d-block">
                  <label class="justify-content-start">Short by:</label>
                  <div class="short-by">
                    <select class="form-control basic-select" id="propertyList_sortBy" name="sortBy">
                      <option value="dateDesc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='dateDesc'?'selected':'') ?>>Date New to Old</option>
                      <option value="dateAsc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='dateAsc'?'selected':'') ?>>Date Old to New</option>
                      <option value="SalesPriceDesc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='SalesPriceDesc'?'selected':'') ?>>Sales Price High to Low</option>
                      <option value="SalesPriceAsc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='SalesPriceAsc'?'selected':'') ?>>Sales Price Low to High</option>
                      <option value="RentPriceDesc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='RentPriceDesc'?'selected':'') ?>>Rent Price High to Low</option>
                      <option value="RentPriceAsc" <?= (isset($searchCond['sortBy']) && $searchCond['sortBy']=='RentPriceAsc'?'selected':'') ?>>Rent Price Low to High</option>
                      
                    </select>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <ul class="property-view-list list-unstyled d-flex mb-0">
            <li>
              <div class="form-inline">
                <div class="form-group d-lg-flex d-block">
                  <label class="justify-content-start pr-2">Sort by: </label>
                  <div class="short-by">
                    <select class="form-control basic-select" id="propertyList_display" class="propertyList_sorting" name="listing">
                      <option value="12" <?= (isset($searchCond['listing']) && $searchCond['listing']=='12'?'selected':'') ?>>12</option>
                      <option value="18" <?= (isset($searchCond['listing']) && $searchCond['listing']=='18'?'selected':'') ?>>18</option>
                      <option value="24" <?= (isset($searchCond['listing']) && $searchCond['listing']=='24'?'selected':'') ?>>24</option>
                      <option value="64" <?= (isset($searchCond['listing']) && $searchCond['listing']=='64'?'selected':'') ?>>64</option>
                    </select>
                  </div>
                </div>
              </div>
            </li>
            <!-- <li><a href="index-half-map.html"><i class="fas fa-map-marker-alt fa-lg"></i></a></li> -->
            <!-- <li><a class="property-list-icon active" href="#list">
              <span></span>
              <span></span>
              <span></span>
            </a></li>
            <li><a class="property-grid-icon" href="#gird">
              <span></span>
              <span></span>
              <span></span>
            </a></li> -->
          </ul>
        </div>
        

      <div class="detailsProperty">
        @include('frontend.propertyListView')
      </div>
      {!! $propertyData->links('layouts.includes.limit_links') !!}

      
      </div>
    </div>
    </form>
  </div>
</section>
<!--=================================
Listing ??? grid view -->
<script src="{{asset('app-assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('app-assets/js/popper/popper.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap/bootstrap.min.js')}}"></script>

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
