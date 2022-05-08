<!-- Search Area -->  
<div id="main_search" style="">
  <div class="">
    <h6><i class="cil-search"></i> Search Area</h6>
  </div>        
  <form id="search" method="POST">
    @csrf
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <div class="row">
        @foreach ($search_field['main_search'] as $field)
          <div class="{{$field['searchArea_class']}}" style="padding-bottom: 5px;">
          @if ($field['db_type'].'' == 'text' || $field['db_type'].'' == 'datetime')
          <input class="form-control" id="{{ $field['name'] }}" type="text" name="{{ $field['name'] }}" placeholder="{{ $field['display'] }}">
          @elseif ($field['db_type'].'' == 'select')
          <select class="form-control select2" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
            @if (isset($field['options']))
              <option value="">All</option>
              @foreach ($field['options'] as $key=> $option)
                <option value="{{$key}}" {{ (isset($field['value']) && $field['value']== $key)? 'selected' : '' }}>{{$option}}</option>
              @endforeach
            @endif
          </select>
          @endif
    
          </div>
        @endforeach
    </div>
    <? //print_r($search_field['sub_search']); exit?>
    @if (sizeof($search_field['sub_search']) > 0)
      <div class="row">
        <div class="col-md-12">
          <a id="searchSubArea" class="link" data-toggle="collapse" href="#sub_search" aria-expanded="true" aria-controls="sub_search" style="text-decoration: none;">
            <i class="cil-caret-bottom"></i><span> More</span>
          </a>
          <div id="sub_search" class="collapse" style="">
            <div class="row">
              @foreach ($search_field['sub_search'] as $field)
              <div class="{{$field['searchArea_class']}}" style="padding-bottom: 5px;">
                @if ($field['db_type'].'' == 'text' || $field['db_type'].'' == 'datetime')
                <input class="form-control" id="{{ $field['name'] }}" type="text" name="{{ $field['name'] }}" placeholder="{{ $field['display'] }}">
                @elseif ($field['db_type'].'' == 'select')
                <select class="form-control select2" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
                  @if (isset($field['options']))
                    <option value="">All</option>
                    @foreach ($field['options'] as $key=> $option)
                      <option value="{{$key}}" {{ (isset($field['value']) && $field['value']== $key)? 'selected' : '' }}>{{$option}}</option>
                    @endforeach
                  @endif
                </select>
                @endif        
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    @endif
    <div class="row pt-3">
      <div class="col-md-9">
        <button type="button" id="btnSubmitSearch" class="btn btn-square btn-outline-primary btn-block"> Search </button>
      </div>
      <div class="col-md-3">
        <button type="button" id="btnResetSearch" class="btn btn-square btn-outline-secondary btn-block"> Reset </button>
      </div>
    </div>
  </form>
</div>
<!-- Search Area -->
