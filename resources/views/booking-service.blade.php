@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<link rel="stylesheet" href="{{ asset('public/css/datepicker/zebra_datepicker.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('public/css/timepicker/jquery.timepicker.min.css') }}">
<style>
.inform{
    color: #ffffff;
    font-size: 13px;
    font-weight: bold;
    background: #007aa5;
    padding: 5px 10px;
    line-height: 19px;
}
.inform span{
  font-size: 20px;
  position: relative;
  top: 3px;
}
.booking-table{
  width: 94.4%;
  margin: 0 auto;
  margin-top: 10px;
}
.booking-table th, .booking-table td {
    padding: 0px 15px;
    font-size: 13px;
}
</style>
@endsection
@section('content')
<div class="inner-banner booking_bg">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>Booking SERVICES</h1>
        </div>
      </div>
    </div>
  </div>
</div>


<section class=" padding-lg pad0 mtb30">
  <div class="container">
   <div class="row">
      <div class="col-md-12" style="padding-bottom:30px;">
      	<strong>Note:</strong> {!! nl2br($service->shot_description) !!}
      </div>
   </div>
  
    <div class="row">
      <div class="col-md-6">
        <div class="adr">
          

          <input id="search_location" class="form-control" type="text" placeholder="Enter a location" style="padding-left:25px; border-radius: 0;" value="<?php if($userData->address != '' && $userData->address != null){ echo $userData->address; }else{ echo "M -38, Samanta Vihar, Kalinga Hospital Square, Chandrasekharpur, Bhubaneswar - 751017, Odisha"; } ?>">
          <i class="fa fa-map-marker adr-map-ico" aria-hidden="true"></i>
        </div>

        <div class="form-horizontal" style="margin-top: 10px; border: 1px solid rgba(0,0,0,.125);margin-bottom:30px;">
          <div id="map" style="width: 100%; height: 422px;"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="test-det">
          <div class="loading-date"><img src="{{ asset('public/images/dual-ring.gif') }}"></div>
          <p class="inform"><span><i class="fa fa-info-circle"></i></span> This service is avalable after {{ $service->hour }} Hour @if($service->minute > 0) {{ $service->minute }} Minute @endif from current time. And service can available @if($service->cms_page->time24_status != 0) between {{ date("g:i A", strtotime($service->cms_page->from_time)) }} TO {{ date("g:i A", strtotime($service->cms_page->to_time)) }} @else at any time @endif</p>
          <div class="row">
            <table class="table table-bordered booking-table">
                  <tr>
                    <th width="30%"><strong>Test Name</strong></th>
                    <td>{{ $service->name }}</td>
                  </tr>
                  <tr>
                    <th><strong>Test ID</strong></th>
                    <td># {{ $service->test_id }} fgfhgf</td>
                  </tr>
                  <tr>
                    <th><strong>Price</strong></th>
                    <td>&#8377; {{ $service->sale_price }}</td>
                  </tr>
                    <th><strong>Mobile Number</strong></th>
                  <td>+91 {{ $userData->phone }}</td>
                  </tr>
            </table>
          </div>
          {{ Form::open(['url' => 'booking-service', 'autocomplete' => 'off', 'onsubmit' => 'return checkdata()']) }}
          {!! Form::hidden('services_id', $service->id) !!}
          {!! Form::hidden('lat', old('lat',$user_lat), ['id' => 'lat']) !!}
          {!! Form::hidden('lng', old('lng',$user_lng), ['id' => 'lng']) !!}
          <div class="row">
            <div class="col-md-6 book-dt"><strong>Booking Date: </strong><br>
              {!! Form::text('booking_date',old('booking_date', $bookDate), ['id' => 'datepicker-disabled-dates', 'readonly'=>'readonly', 'data-zdp_readonly_element'=>'false', 'placeholder'=>'Booking Date']) !!}
              <div class="book-date"></div>
            </div>
            <div class="col-md-6"> <strong>Service Provide Time: </strong><br>
              {!! Form::text('booking_time',old('booking_time'), ['id' => 'timepicker', 'readonly'=>'readonly', 'placeholder'=>'Booking Time']) !!}
              <button type="button" class="timePicker_Icon">Pick a Time</button>
            </div>
            <div class="col-md-12 book-msg" style="display: none;"></div>
          </div>
          <div class="row">
            <div class="col-md-12"> <strong>Service Address </strong><br>
              {!! Form::textarea('service_address',old('service_address', $userData->address), ['id'=> 'service_address', 'rows' =>'2', 'placeholder'=>'Service Address', 'style'=>'width:100%']) !!} </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4 class="note">Note : {{ Form::submit('Book Now', array('class' => 'btn btn-primary btn-sm pull-right', 'style' => 'border-radius: 1px;padding: 6px 15px;')) }}</h4>
            </div>
            <div class="col-md-12">
              <ul class="restriction">
                <li>Search your  landmark in the serch box.</li>
                <li>After searching, drag the map marker to your exact/near your location.</li>
              </ul>
            </div>
          </div>
          {{ Form::close() }} </div>
      </div>
    </div>
  </div>
</section>
@endsection
@push('script')
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $map_api_key; ?>&libraries=places" type="text/javascript"></script>
<script src="{{ asset('public/js/timepicker/jquery.timepicker.min.js') }}"></script> 
<script>
function initialize() {
var latlng = new google.maps.LatLng(<?php if($userData->lat != '' && $userData->lat != null){ echo $userData->lat; }else{ echo $user_lat; }  ?>,<?php if($userData->lng != '' && $userData->lng != null){ echo $userData->lng; }else{ echo $user_lng; } ?>);
  var map = new google.maps.Map(document.getElementById('map'), {
	center: latlng,
	zoom: 13
  });

  var marker = new google.maps.Marker({
	map: map,
	position: latlng,
	draggable: true,
	anchorPoint: new google.maps.Point(0, -29)
 });

google.maps.event.addListener(marker, 'drag', function (event) {
 document.getElementById("lat").value = this.getPosition().lat();
 document.getElementById("lng").value = this.getPosition().lng();
 infowindow.close();
	 //marker.setVisible(false);
});


//Update marker address when the marker is dragged
google.maps.event.addListener(marker, 'dragend', function(){
 geocoder.geocode({latLng: marker.getPosition()}, function(responses) {
   if (responses && responses.length > 0) {
	 document.getElementById('search_location').value = responses[0].formatted_address;
	 marker.setVisible(true);
	 infowindow.setContent(responses[0].formatted_address);
	 infowindow.open(map, marker);
	 document.getElementById('service_address').value = '';
	var addr_component_ary = responses[0].address_components;     
	for (var i = 0; i < addr_component_ary.length; i++) {
	  var addressType = addr_component_ary[i].types[0];
	}
	
  } else {
	alert('Error: Google Maps could not determine the address of this location.');
  }
});
map.panTo(marker.getPosition());
});


var search_location_input = document.getElementById('search_location');
var geocoder = new google.maps.Geocoder();
var autocomplete = new google.maps.places.Autocomplete(search_location_input);
autocomplete.bindTo('bounds', map);
var infowindow = new google.maps.InfoWindow();   
  autocomplete.addListener('place_changed', function() {
  infowindow.close();
  marker.setVisible(false);
  var place = autocomplete.getPlace();
if (!place.geometry) {
		  window.alert("Autocomplete's returned place contains no geometry");
		  return;
	  }
	  // If the place has a geometry, then present it on a map.
	  if (place.geometry.viewport) {
		  map.fitBounds(place.geometry.viewport);
	  } else {
		  map.setCenter(place.geometry.location);
		  map.setZoom(17);
	  }
	  marker.setPosition(place.geometry.location);
	  marker.setVisible(true);
for (var i = 0; i < place.address_components.length; i++) {
   var addressType = place.address_components[i].types[0];
}
document.getElementById('lat').value = place.geometry.location.lat();
document.getElementById('lng').value = place.geometry.location.lng();
document.getElementById('service_address').value = '';
  infowindow.setContent(place.formatted_address);
  infowindow.open(map, marker);
  });
 
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>
//######## time picker ############//
//var serHour = 2;
// var dt = new Date();
// var currentDate = dt.getDate()+'-'+(dt.getMonth() + 1)+'-'+dt.getFullYear();
// var currentH = dt.getHours();
$("#timepicker").timepicker({
    minTime: '<?php echo $bookFromTime; ?>',
    maxTime: '<?php echo $bookToTime; ?>',
});

$('.ui-corner-all').on('click', function(){
  var selectDate = $('#datepicker-disabled-dates').val();
  var selectTime = $('#ui-active-item').html();
  var arr = selectDate.split("-");
  var months = [ "blank","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  var d = new Date(arr[2]+'-'+arr[1]+'-'+arr[0]);
  var day = d.getDay();
  $('#timepicker').val(selectTime);
  $('.book-msg').css('display','block');
  $('.book-msg').html('You will get this service on<span> ' + arr[0]+' ' + months[parseInt(arr[1])] + ' ' + arr[2] + ' '+ days[day] + '</span> at <span>' + selectTime + '</span>');
})

function checkdata(){
  var timepicker = $('#timepicker').val();
  var service_address = $('#service_address').val();
  if(timepicker == ''){
    $('#timepicker').addClass('errorfield');
    $('#timepicker').focus();
    return false;
  }else{
    $('#timepicker').removeClass('errorfield');
  }
  if(service_address == ''){
    $('#service_address').addClass('errorfield');
    $('#service_address').focus();
    return false;
  }else{
    $('#service_address').removeClass('errorfield');
  }
}

$(document).ready(function() {
  $('#datepicker-disabled-dates').Zebra_DatePicker({
    direction: [<?php echo $diffDays ?>,29],
    disabled_dates: ['1-10'],
    format: 'd-m-Y',
    disabled_dates: ['0'],
    onSelect: function(date, instance){
        $.ajax({
            type: "Post",
            dataType: "json",
            beforeSend: function () {
              $('.loading-date').css('display', 'block');
            },
            url: "{{ url('/changedate') }}",
            data: {date:date, assignDate: '<?php echo $bookDate ?>', assignTime : '<?php echo $serverTime ?>', category : '<?php echo $service->cms_page->id ?>' },
            success: function(result){
                if(result.response == 'success'){
                  $('#timepicker').val('');
                  $('.book-msg').html('');
                  $('.book-msg').css('display','none');
                  $('.loading-date').css('display', 'none');
                  $('.ui-timepicker-viewport').html('');
                  $.each(result.getHours, function(key, val) {
                        $('.ui-timepicker-viewport').append($("<li class='ui-menu-item' style='width:174px;'><a class='ui-corner-all'>"+val+"</a></li>"));
                    });
                }
            }
         });
     }
  });
});
</script>
<script src="{{ asset('public/js/datepicker/zebra_datepicker.min.js') }}"></script> 
@endpush