@extends('dashboard.base')

@section('content')
<style>
  .fc-event{ font-size: .9em; },
  .fc-event-dot{ font-size: .9em; },
  .fc-title{ font-size: .9em; }
</style>

<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
      <div class="card-header">
          <p class="fa fa-align-justify h2">Appointment</p>
      </div>
      <div class="card-body">        
        <div class="container">
          <div class="response"></div>
          <div id='calendar'></div>  
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                  <div class='col-12'>
                    <h4>Appointment Details <small id="booking_id"></small></h4>  
                  </div>          
                </div>
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="card" style="margin-bottom: 0;">
                          <div class="card-body">
                            <h5 class="card-title">Customer Details</h5>
                            <p class="card-text"><p id="cust_dtl"></p></p>
                          </div>
                        </div>
                      </div>  
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="card" style="margin-bottom: 0;">
                          <div class="card-body">
                            <h5 class="card-title">Agent Details <small id="agent_id"></small></h5>
                            <p class="card-text"><p id="agent_dtl"></p></p>
                          </div>
                        </div>
                      </div>  
                    </div>
                    <label class="col-form-label">Date</label>
                    <div id="datetimepicker1"><input type="text" class="form-control" name="booked_date" id="booked_date" disabled></div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label class="col-form-label">Start Time</label>
                        <input type="text" class="form-control" name="booked_start_time" id="booked_start_time" disabled>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
                        <label class="col-form-label">End Time</label>                        
                        <input type="text" class="form-control" name="booked_end_time" id="booked_end_time" disabled>
                      </div>
                    </div>
                    <label class="col-form-label">Remark</label>
                    <textarea class="form-control" name="remark" id="remark"></textarea>
                    <div class="row" style="margin-top:13px;">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label class="col-form-label">Created: &nbsp;</label><label id="created_date"></label>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="row">                        
                          <div class="col-2">
                            <label class="col-form-label">Status: &nbsp;</label>
                          </div>
                          <div class="col-10">
                            <select class="form-control" id="status">
                              <option value="pending">Pending</option>
                              <option value="hold">On Hold</option>
                              <option value="finish">Finish</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Property Details <small id="property_id"></small></h5>
                        <p class="card-text"><span id="pty_dtl"></span><div id="map" class="embed-responsive embed-responsive-16by9"></div></p>
                      </div>
                    </div>               
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <a href="{{ route('printPASP') }}" class="btn btn-primary" target="_blank" > Print PASP </a>
              <a href="{{ route('printPASP') }}" class="btn btn-primary" target="_blank" > Print Visited (睇樓紙) </a>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Modal -->

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addLabel">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                  <div class='col-12'>
                    <h4>Add Appointment</h4>  
                  </div>          
                </div>
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="card" style="margin-bottom: 0;">
                          <div class="card-body">
                            <h5 class="card-title">Customer Details</h5>
                            <p class="card-text"><p id="cust_dtl"></p></p>
                          </div>
                        </div>
                      </div>  
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="card" style="margin-bottom: 0;">
                          <div class="card-body">
                            <h5 class="card-title">Agent Details</h5>
                            <p class="card-text"><p id="agent_dtl"></p></p>
                          </div>
                        </div>
                      </div>  
                    </div>
                    <label class="col-form-label">Date</label>
                    <div id="datetimepicker1"><input type="text" class="form-control" name="booked_date" id="booked_date" disabled></div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label class="col-form-label">Start Time</label>
                        <input type="text" class="form-control" name="booked_start_time" id="booked_start_time" disabled>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">  
                        <label class="col-form-label">End Time</label>                        
                        <input type="text" class="form-control" name="booked_end_time" id="booked_end_time" disabled>
                      </div>
                    </div>
                    <label class="col-form-label">Remark</label>
                    <textarea class="form-control" name="remark" id="remark"></textarea>
                    <div class="row" style="margin-top:13px;">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label class="col-form-label">Created: &nbsp;</label><label id="created_date"></label>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="row">                        
                          <div class="col-2">
                            <label class="col-form-label">Status: &nbsp;</label>
                          </div>
                          <div class="col-10">
                            <select class="form-control" id="status">
                              <option value="pending">Pending</option>
                              <option value="hold">On Hold</option>
                              <option value="finish">Finish</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Property Details</h5>
                        <p class="card-text"><span id="pty_dtl"></span><div id="map" class="embed-responsive embed-responsive-16by9"></div></p>
                      </div>
                    </div>               
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <a href="" class="btn btn-primary"> Save </a> <!-- {{-- route('saveAppointment') --}} -->
            </div>
        </div>
    </div>
</div>
<!-- End Add Modal -->

@endsection

@section('javascript')
<script type="text/javascript">

function initMap(lat, lng, property_id) {
  var uluru = {lat: lat, lng: lng};
  var map = new google.maps.Map(document.getElementById('map'), {
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
  //$('#datetimepicker1').datepicker();
  $('#print_document').on('click', function (){
    alert('clicked!');
  });

  var SITEURL = "{{url('/')}}";
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  var calendar = $('#calendar').fullCalendar({
    editable: true,
    events: "/data/appointment",
    displayEventTime: true,
    editable: true,
    selectable: true,
    selectHelper: true,
    eventRender: function (event, element, view) {
      if (event.allDay === 'true') event.allDay = true;
      else event.allDay = false;
    },
    select: function (start, end, allDay) {
      console.log("select");
      $('#addModal').modal();

      // var title = prompt('Event Title:');
      // if (title) {
      //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      //     $.ajax({
      //         url: SITEURL + "fullcalendar/create",
      //         data: 'title=' + title + '&amp;start=' + start + '&amp;end=' + end,
      //         type: "POST",
      //         success: function (data) {
      //             displayMessage("Added Successfully");
      //         }
      //     });
      //     calendar.fullCalendar('renderEvent',{title: title, start: start, end: end, allDay: allDay},true);
      // }
      // calendar.fullCalendar('unselect');
      },         
      eventDrop: function (event, delta) {
        displayMessage("Updated Successfully");
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: SITEURL + 'fullcalendar/update',
                data: 'title=' + event.title + '&amp;start=' + start + '&amp;end=' + end + '&amp;id=' + event.id,
                type: "POST",
                success: function (response) {
                    displayMessage("Updated Successfully");
                }
            });
      },
      eventClick: function (event) {
        console.log(event);
        $('#editModal').modal();
        $('#booking_id').html(event.booking_id);
        $('#booked_date').val(moment(event.start).format('DD-MM-YYYY'));          
        $('#booked_start_time').val(moment(event.start).format('HH:mm:ss'));
        $('#booked_end_time').val(moment(event.end).format('HH:mm:ss'));
        $('#created_date').html(moment(event.created_at).format('DD-MM-YYYY HH:mm:ss'));
        $('#remark').val(event.remark);
        $("#status").val(event.status).change();
        $("#property_id").html(event.property_id);
        $("#agent_id").html(event.agent_id);

        /* Print Customer Details */
        var custHtml = "<table>";
        Object.keys(event.customer).forEach((key) => {
          custHtml += "<tr>";
          custHtml += "<td style='font-weight: bold; vertical-align: top;'>"+key+":</td>";
          custHtml += "<td>"+event.customer[key]+"</td>";
          custHtml += "</tr>";            
        });
        custHtml += "</table>";
        $('#cust_dtl').html(custHtml);
        /* End Print Customer Details */

        /* Print Property Details */
        var ptyHTML = "<table>";
        Object.keys(event.property).forEach((key) => {
          ptyHTML += "<tr>";
          ptyHTML += "<td style='font-weight: bold; vertical-align: top;'>"+key+":</td>";
          ptyHTML += "<td>"+event.property[key]+"</td>";
          ptyHTML += "</tr>";            
        });
        ptyHTML += "</table>";
        $('#pty_dtl').html(ptyHTML);
        initMap(event.property.Latitude, event.property.Longitude, event.property.property_id);
        /* End Print Property Details */

        /* Print Agent Details */
        var ptyHTML = "<table>";
        Object.keys(event.agent).forEach((key) => {
          ptyHTML += "<tr>";
          ptyHTML += "<td style='font-weight: bold; vertical-align: top;'>"+key+":</td>";
          ptyHTML += "<td>"+event.agent[key]+"</td>";
          ptyHTML += "</tr>";            
        });
        ptyHTML += "</table>";
        $('#agent_dtl').html(ptyHTML);
        /* Print End Agent Details */
      }
      });
});
 
  function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
  }
</script>
@endsection

@section('customjs')
<script src="{{ asset('js/custom.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX1rWSMcYwZ0EbzYu5C7ZgIUrKIEw4fEs"></script>
<script src='fullcalendar/core/main.js'></script>
<script src='fullcalendar/daygrid/main.js'></script>
@endsection