@extends('admin.layouts.master')
@section('title','Add Associate User')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<style>
.adr-map-ico {
    position: absolute;
    top: 5px;
    left: 15px;
    font-size: 24px;
    color: #667480;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Add Associate User</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content"> @include('admin.includes.msg')
            {{ Form::open(['url' => 'associate-registration', 'role' => 'form', 'class' =>'form-horizontal form-label-left', 'files'=>true, 'autocomplete' => 'off', 'data-toggle' => 'validator']) }}
            <div class="col-md-6">
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('first_name',old('first_name'), ['id' => 'first_name','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'First Name']) !!}
                  @if ($errors->has('first_name')) <span class="help-block"> <strong>{{ $errors->first('first_name') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dob">Date of Birth <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('dob',old('dob'), ['id' => 'dob','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Date of Birth']) !!}
                  @if ($errors->has('dob')) <span class="help-block"> <strong>{{ $errors->first('dob') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experience">Experience <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('experience',old('experience'), ['id' => 'experience','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Experience']) !!}
                  @if ($errors->has('experience')) <span class="help-block"> <strong>{{ $errors->first('experience') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone_no">Phone <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('phone_no',old('phone_no'), ['id' => 'phone_no','required', 'onkeypress' => 'return isNumber(event)', 'maxlength'=>'10', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Phone']) !!}
                  @if ($errors->has('phone_no')) <span class="help-block"> <strong>{{ $errors->first('phone_no') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Present Address <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::textarea('address',old('address'), ['id' => 'sort_description','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'placeholder'=>'Present Address']) !!}
                  @if ($errors->has('address')) <span class="help-block"> <strong>{{ $errors->first('address') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zone">Zone <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::textarea('zone',old('zone'), ['id' => 'sort_description','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'placeholder'=>'Zone']) !!}
                  @if ($errors->has('zone')) <span class="help-block"> <strong>{{ $errors->first('zone') }}</strong> </span> @endif 
                </div>
              </div>
              <div class="item col-md-12">
                <div class="item form-group col-md-12" style="padding: 0;margin: 0;">
                <div class="adr"> 
                  {!! Form::text('search_location',old('search_location'), ['id' => 'search_location','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Enter a location', 'style'=>'padding-left:32px;']) !!}
                  <i class="fa fa-map-marker adr-map-ico" aria-hidden="true"></i> 
                  @if ($errors->has('search_location')) <span class="help-block"> <strong>{{ $errors->first('search_location') }}</strong> </span> @endif </div>
              </div>
                <div class="form-horizontal" style="margin-top: 47px; border: 1px solid rgba(0,0,0,.125);margin-bottom:30px;">
                  <div id="map" style="width: 100%; height: 396px;"></div>
                  <div class="m-t-small" style="display:none;">
                    <label class="p-r-small col-sm-1 control-label">Lat.:</label>
                    <div class="col-sm-3">
                      {!! Form::text('lat',old('lat'), ['id' => 'lat']) !!}
                    </div>
                    <label class="p-r-small col-sm-2 control-label">Long.:</label>
                    <div class="col-sm-3">
                      {!! Form::text('lng',old('lng'), ['id' => 'lng']) !!}
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Surname <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('surname',old('surname'), ['id' => 'surname','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Surnames']) !!}
                  @if ($errors->has('surname')) <span class="help-block"> <strong>{{ $errors->first('surname') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="skill">Skills / Occupation <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('skill',old('skill'), ['id' => 'skill','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Skills / Occupation']) !!}
                  @if ($errors->has('skill')) <span class="help-block"> <strong>{{ $errors->first('skill') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('email',old('email'), ['id' => 'email','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Email']) !!}
                  @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fathers_name">Father’s Name <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::text('fathers_name',old('fathers_name'), ['id' => 'fathers_name','required', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Father’s Name']) !!}
                  @if ($errors->has('fathers_name')) <span class="help-block"> <strong>{{ $errors->first('fathers_name') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permanent_address">Permanent Address <span class="required">*</span> </label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::textarea('permanent_address',old('permanent_address'), ['id' => 'sort_description','required', 'class'=>'form-control col-md-7 col-xs-12', 'rows' =>'4', 'placeholder'=>'Permanent Address']) !!}
                  @if ($errors->has('permanent_address')) <span class="help-block"> <strong>{{ $errors->first('permanent_address') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_proof">ID Proof <span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::file('id_proof', ['id' => 'id_proof', 'class'=>'form-control col-md-7 col-xs-12', 'required', 'onchange'=>'return fileValidation()']) !!}
                  @if ($errors->has('id_proof')) <span class="help-block"> <strong>{{ $errors->first('id_proof') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="residence_proof">Residence Proof <span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::file('residence_proof', ['id' => 'residence_proof', 'class'=>'form-control col-md-7 col-xs-12', 'required', 'onchange'=>'return residenceFileValidation()']) !!}
                  @if ($errors->has('residence_proof')) <span class="help-block"> <strong>{{ $errors->first('residence_proof') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="educational_certificates">Educational Certificates <span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::file('educational_certificates', ['id' => 'educational_certificates', 'class'=>'form-control col-md-7 col-xs-12', 'required', 'onchange'=>'return educationalFileValidation()']) !!}
                  @if ($errors->has('educational_certificates')) <span class="help-block"> <strong>{{ $errors->first('educational_certificates') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="verification_certificate">Verification Certificate <span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::file('verification_certificate', ['id' => 'verification_certificate', 'class'=>'form-control col-md-7 col-xs-12', 'required', 'onchange'=>'return verificationFileValidation()']) !!}
                  @if ($errors->has('verification_certificate')) <span class="help-block"> <strong>{{ $errors->first('verification_certificate') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="experience_certificate">Experience Certificate <span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::file('experience_certificate', ['id' => 'experience_certificate', 'class'=>'form-control col-md-7 col-xs-12', 'required', 'onchange'=>'return experienceFileValidation()']) !!}
                  @if ($errors->has('experience_certificate')) <span class="help-block"> <strong>{{ $errors->first('experience_certificate') }}</strong> </span> @endif </div>
              </div>
              <div class="item form-group col-md-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agreement_letter">Agreement Letter <span class="required">*</span></label>
                <div class="col-md-9 col-sm-6 col-xs-12"> {!! Form::file('agreement_letter', ['id' => 'agreement_letter', 'class'=>'form-control col-md-7 col-xs-12', 'required', 'onchange'=>'return agreementFileValidation()']) !!}
                  @if ($errors->has('agreement_letter')) <span class="help-block"> <strong>{{ $errors->first('agreement_letter') }}</strong> </span> @endif </div>
              </div>
              <div class="form-group col-md-12">
                <div class="col-md-9 col-md-offset-3"> {{ Form::submit('Save', array('class' => 'btn btn-success')) }} <a href="{{ url('administrator/associate-registration') }}" class="btn btn-primary">Back</a> </div>
              </div>
            </div>
            {{ Form::close() }} </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@push('script') 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABO3gjGH7SymxSGRZwZ6S2rjKtCtHIWIY&libraries=places" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script> 
<script>
function initialize() {
var latlng = new google.maps.LatLng(20.3148233,85.82074920000002);
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
  infowindow.setContent(place.formatted_address);
  infowindow.open(map, marker);
  });
 
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

var acpt_exe = ["png","PNG","jpg","JPG","jpeg","JPEG","gif","GIF","svg","SVG"];
function fileValidation(){
    var id_proofPath = $('#id_proof').val();
    var idProofExe = id_proofPath.split('.')[1];
    if($.inArray(idProofExe, acpt_exe) == -1) {
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
        $('#id_proof').val('');
        return false;
    }else{
      return true;
    }
}

function residenceFileValidation(){
  var residencePath = $('#residence_proof').val();
    var residenceExe = residencePath.split('.')[1];
    if($.inArray(residenceExe, acpt_exe) == -1) {
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
        $('#residence_proof').val('');
        return false;
    }else{
      return true;
    }
}

function educationalFileValidation(){
  var educationalPath = $('#educational_certificates').val();
    var educationalExe = educationalPath.split('.')[1];
    if($.inArray(educationalExe, acpt_exe) == -1) {
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
        $('#educational_certificates').val('');
        return false;
    }else{
      return true;
    }
}

function verificationFileValidation(){
  var verificationPath = $('#verification_certificate').val();
    var verificationExe = verificationPath.split('.')[1];
    if($.inArray(verificationExe, acpt_exe) == -1) {
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
        $('#verification_certificate').val('');
        return false;
    }else{
      return true;
    }
}

function experienceFileValidation(){
  var experiencePath = $('#experience_certificate').val();
    var experienceExe = experiencePath.split('.')[1];
    if($.inArray(experienceExe, acpt_exe) == -1) {
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
        $('#experience_certificate').val('');
        return false;
    }else{
      return true;
    }
}

function agreementFileValidation(){
    var agreementPath = $('#agreement_letter').val();
    var agreementExe = agreementPath.split('.')[1];
    if($.inArray(agreementExe, acpt_exe) == -1) {
        alert('Please upload file having extensions .png/.jpg/.jpeg/.svg/.gif only.');
        $('#agreement_letter').val('');
        return false;
    }else{
      return true;
    }
}

$(document).ready(function () {
    $('#dob').datepicker({
        autoclose: true,
        todayHighlight: true
    });
});
</script> 
@endpush