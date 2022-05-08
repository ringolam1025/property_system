@extends('dashboard.base')

@section('content')
<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
      <div class="card-header">
          <p class="fa fa-align-justify h2">
            {{ $page_title }}
            <a href="{{$page_id}}/create" class="btn btn-square btn-info btn-lg float-right"><i class="cil-plus"></i> Add {{ $page_title }}</a>
          </p>
          @include('dashboard.shared.search-area')
      </div>
      <div class="card-body">        
        <table class="table table-bordered data-table table-responsive-sm table-striped">
          <thead>
            <tr>
              <th style="width:3%"></th>
              @foreach ($list_field as $field)                
                <th style="width:{{ $field['headerWidth'] }}%">{{ $field['display'] }}</th>               
              @endforeach
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
$(function() {
  var header = {!! json_encode($list_field) !!};
  header.unshift({"name":"action","data":"action","orderable":false});
  initDataTable();

  function initDataTable (filter=''){
    var table = $('.data-table').DataTable({
      dom: '<"top"i>rt<"bottom"flp><"clear">',
      processing: true,
      serverSide: true,
      searching: false,
      scrollCollapse: false,
      bLengthChange: false,
      bFilter: false,
      bInfo: true,
      bAutoWidth: true,
      columns: header,
      ajax: "{{ route('agent.index') }}"
    });
  }

  $('#btnSubmitSearch').click(function(){
    $('.data-table').DataTable().destroy();

    var formData = $("#search").serializeArray();
    table = $('.data-table').DataTable({
      dom: '<"top"i>rt<"bottom"flp><"clear">',
      processing: true,
      serverSide: true,
      searching: false,
      scrollCollapse: false,
      bLengthChange: false,
      bFilter: false,
      bInfo: true,
      bAutoWidth: true,
      columns: header,
      ajax: {
              url: "{{ route('agent.search') }}",
              type: 'POST',
              data:{ "_token": $('#token').val(), "formData":formData }
            }
    });
  });

  $( "#DataTables_Table_0" ).on( "click", 'tbody tr .remove', function() {
    var id = $(this).attr('data-id');
    var name = $(this).attr('data-name');
    var url = $(this).attr('data-url');
    $("#btnConfirm").attr("href",url);
    $('#recordList').html(id+' '+name);
  });
});
</script>
@endsection

@section('customjs')
<script src="{{ asset('js/custom.js') }}"></script>
@endsection