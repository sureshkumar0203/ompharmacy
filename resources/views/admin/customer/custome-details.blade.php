@extends('admin.layouts.master')
@section('title', 'User Registration Details')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left" style="width: 100%;">
        <h3 style="float: left;">User Registration Details</h3>
        <div class="nav navbar-right panel_toolbox"> <a href="{{ url('administrator/customer') }}" class="btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> Back to List</a> </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <section class="content invoice">
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                  <strong><h4>Personal Details.</h4></strong> <br>
                  <strong>Full Name</strong> : {{ $customeDet->first_name }} {{ $customeDet->last_name }} <br>
                  <strong>Phone</strong> : {{ $customeDet->phone }} <br>
                  <strong>Email</strong> : {{ $customeDet->email }} <br>
                  <strong>Address</strong> : {{ $customeDet->address }} @if($customeDet->pincode !='')(Pincode - {{ $customeDet->pincode }})@endif <br>
                </div>
                <hr />
                <div class="col-sm-12 invoice-col">
                  <strong><h4>Personal Information.</h4></strong> <br>
                  <strong>Disease profile</strong> : {{ $customeDet->disease_profile }}<br>
                  <strong>Consultant contact details</strong> : {{ $customeDet->consultant_contact_dtls }} <br>
                  <strong>Hospital to be in case of emergency</strong> : {{ $customeDet->hospital_dtls }} <br>
                  <strong>Bhubaneswar based contact person details</strong> : {{ $customeDet->relative_contact_dtls }}<br>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection