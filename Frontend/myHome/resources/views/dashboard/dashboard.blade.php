@extends('dashboard.base')

@section('content')
<div class="container-fluid">
  <div class="fade-in">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Search Condition by District</h5>
        <div class="row card-text">
          <div class="col-sm-6 col-lg-6">
            {!! $districtByChatbotChart->container() !!}
          </div>
          <div class="col-sm-6 col-lg-6">
            {!! $districtByWebChart->container() !!}    
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Search Condition by Transaction Type</h5>
        <div class="row card-text">
          <div class="col-sm-6 col-lg-6">
            {!! $tranTypeByChatbotChart->container() !!}
          </div>
          <div class="col-sm-6 col-lg-6">
            {!! $tranTypeByWebChart->container() !!}    
          </div>
        </div>
      </div>
    </div>




  </div>
</div>
@if($districtByChatbotChart)
  {!! $districtByChatbotChart->script() !!}
@endif

@if($districtByWebChart)
  {!! $districtByWebChart->script() !!}
@endif

@if($districtByWebChart)
  {!! $tranTypeByChatbotChart->script() !!}
@endif

@if($districtByWebChart)
  {!! $tranTypeByWebChart->script() !!}
@endif

@endsection

@section('javascript')

@endsection
