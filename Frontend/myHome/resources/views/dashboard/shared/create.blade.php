@extends('dashboard.base')
@section('content')
<div class="row">
  <div class="col">
    <div class="card">
     <form method="POST" action="{{ $createAction }}">  <!-- {{ route('subdistrict.store') }} -->
      @csrf
        <div class="card-header">
          Create {{ $page_title }}
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-2">
                <div class="list-group" id="list-tab" role="tablist">
                  @foreach ($groups as $group)
                    @if ($group['default'])
                      <a class="list-group-item list-group-item-action active" id="list-{{ $group['name'] }}-list" data-toggle="tab" href="#list-{{ $group['name'] }}" role="tab" aria-controls="list-{{ $group['name'] }}">{{ $group['display'] }}</a>
                    @else
                      <a class="list-group-item list-group-item-action " id="list-{{ $group['name'] }}-list" data-toggle="tab" href="#list-{{ $group['name'] }}" role="tab" aria-controls="list-{{ $group['name'] }}">{{ $group['display'] }}</a>
                    @endif
                  @endforeach
                </div>
              </div>
              <div class="col-10">
                <div class="tab-content" id="nav-tabContent">
                  @foreach ($groups as $group)
                    @if ($group['default'])
                      <div class="tab-pane fade active show" id="list-{{ $group['name'] }}" role="tabpanel" aria-labelledby="list-{{ $group['name'] }}-list">
                    @else
                      <div class="tab-pane fade" id="list-{{ $group['name'] }}" role="tabpanel" aria-labelledby="list-{{ $group['name'] }}-list">
                    @endif
                    <div class="form-group row">
                    @foreach ($fields as $field)
                      @if ($group['name'].'' == $field['group'])
                        <div class="{{$field['newModal_class']}}">
                          <label for="{{ $field['name'] }}">{{ $field['display'] }}</label>
                          <!-- String, int, date, textarea, select, html -->
                          @if ($field['db_type'].'' == 'text')
                            <input class="form-control" id="{{ $field['name'] }}" type="text" name="{{ $field['name'] }}" placeholder="{{ $field['display'] }}" value="{{ isset($field['value'])?$field['value']:'' }}" {{ ($field['readonly']) ? 'disabled' : '' }}>
                          @elseif ($field['db_type'].'' == 'textarea')
                            <textarea class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" rows="9" placeholder="{{ $field['display'] }}">{{ isset($field['value'])?$field['value']:'' }}</textarea>
                          @elseif ($field['db_type'].'' == 'datetime')
                            <input class="form-control" id="{{ $field['name'] }}" type="text" name="{{ $field['name'] }}" placeholder="{{ $field['display'] }}" value="{{ isset($field['value'])?$field['value']:'' }}">
                          @elseif ($field['db_type'].'' == 'select')
                            <select class="form-control select2" id="{{ $field['name'] }}" name="{{ $field['name'] }}">
                              @if (isset($field['options']))
                                @foreach ($field['options'] as $key=> $option)
                                  <option value="{{$key}}" {{ (isset($field['value']) && $field['value']== $key)? 'selected' : '' }}>{{$option}}</option>
                                @endforeach
                              @endif
                            </select>
                          @elseif ($field['db_type'].'' == 'htmledit') 
                            <textarea class="form-control summernote {{ $field['name'] }}" name="{{ $field['name'] }}">{{ isset($field['value'])?$field['value']:'' }}</textarea> 
                          
                          @elseif ($field['db_type'].'' == 'checkbox') 
                            <label class="switch switch-3d switch-primary">
                              <input type="checkbox" class="switch-input" checked>
                              <span class="switch-label"></span>
                              <span class="switch-handle"></span>
                            </label>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="{{ $field['name'] }}">
                              <label class="custom-control-label" for="{{ $field['name'] }}">{{ $field['display'] }}</label>
                            </div>
                          @endif
                        </div>
                      @endif
                    @endforeach
                    </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-12">
              <div class="float-right col-2">
                <button class="btn btn-square btn-block btn-success" type="submit">{{ __('Save') }}</button>
              </div>
              <div class="float-left col-2">
                <!-- <a href="{{ route('subdistrict.index') }}" class="btn btn-square btn-block btn-secondary">{{ __('Return') }}</a> -->
                <a href="/data/{{$page_id}}" class="btn btn-square btn-block btn-secondary">{{ __('Return') }}</a>                
              </div>              
            </div>
          </div>
        </div>
      </form>
    </div>
@endsection

@section('javascript')

@endsection
