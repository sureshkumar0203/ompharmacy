@extends('admin.layouts.master')
@section('title', 'Associate Registration Details')
@section('css');
<link rel="stylesheet" href="{{ asset('public/css/lightbox/lightbox.css') }}">
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left" style="width: 100%;">
        <h3 style="float: left;">Associate Registration Details</h3>
        <div class="nav navbar-right panel_toolbox"> <a href="{{ url('administrator/associate-registration') }}" class="btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> Back to List</a> </div>
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
                <div class="col-sm-4 invoice-col">
                  <address>
                  <strong>Personal Details.</strong> <br>
                  Name: {{ $user->name }} <br>
                  Fathers Name: {{ $user->fathers_name }} <br>
                  Phone: {{ $user->phone_no }} <br>
                  Email: {{ $user->email }} <br>
                  DOB: {{ $user->dob }} <br>
                  Skill: {{ $user->skill }} <br>
                  Experience: {{ $user->experience }} <br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                  <strong>Present Address</strong> <br>
                  {{ $user->address }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col"> <b>Permanent Address</b> <br>
                  {{ $user->permanent_address }}
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.row --> 
              <!-- Table row -->
              <div class="row id-proof">
                <div class="col-sm-3 ">
                <p class="id-proof-bg">ID Proof</p>
                <div class="idp">
                  <a class="gal_link" href="{{ asset('storage/app/'.$user->associate_doc[0]->id_proof) }}">                  
                  <img src="{{ asset('storage/app/'.$user->associate_doc[0]->id_proof) }}" /></a>
                  <span class="down-ico"><a href="{{ asset('storage/app/'.$user->associate_doc[0]->id_proof) }}" download><i class="fa fa-download"></i></a></span>
                  </div>
                </div>
                
                <div class="col-sm-3">
                <p class="id-proof-bg">Residence proof</p>
                 <div class="idp">
                  <a class="gal_link" href="{{ asset('storage/app/'.$user->associate_doc[0]->residence_proof) }}">
                  <img src="{{ asset('storage/app/'.$user->associate_doc[0]->residence_proof) }}" /></a>
                  <span class="down-ico"><a href="{{ asset('storage/app/'.$user->associate_doc[0]->residence_proof) }}" download><i class="fa fa-download"></i></a></span>
                  </div>
                </div>
                
                <div class="col-sm-3">
                <p class="id-proof-bg">Educational Certificates</p>
                 <div class="idp">
                  <a class="gal_link" href="{{ asset('storage/app/'.$user->associate_doc[0]->educational_certificates) }}">
                  <img src="{{ asset('storage/app/'.$user->associate_doc[0]->educational_certificates) }}" /></a>
                  <span class="down-ico"><a href="{{ asset('storage/app/'.$user->associate_doc[0]->educational_certificates) }}" download><i class="fa fa-download"></i></a></span>
                  </div>
                </div>
                
                <div class="col-sm-3">
                <p class="id-proof-bg">Verification certificate</p>
                 <div class="idp">
                  <a class="gal_link" href="{{ asset('storage/app/'.$user->associate_doc[0]->verification_certificate) }}">
                  <img src="{{ asset('storage/app/'.$user->associate_doc[0]->verification_certificate) }}" /></a>
                  <span class="down-ico"><a href="{{ asset('storage/app/'.$user->associate_doc[0]->verification_certificate) }}" download><i class="fa fa-download"></i></a></span>
                  </div>
                </div>
                
                <div class="col-sm-3">
                <p class="id-proof-bg">Experience certificate</p>
                 <div class="idp">
                  <a class="gal_link" href="{{ asset('storage/app/'.$user->associate_doc[0]->experience_certificate) }}">
                  <img src="{{ asset('storage/app/'.$user->associate_doc[0]->experience_certificate) }}" /></a>
                  <span class="down-ico"><a href="{{ asset('storage/app/'.$user->associate_doc[0]->experience_certificate) }}" download><i class="fa fa-download"></i></a></span>
                  </div>
                </div>
                
                <div class="col-sm-3">
                <p class="id-proof-bg">Agreement letter</p>
                 <div class="idp">
                  <a class="gal_link" href="{{ asset('storage/app/'.$user->associate_doc[0]->agreement_letter) }}">
                  <img src="{{ asset('storage/app/'.$user->associate_doc[0]->agreement_letter) }}" /></a>
                  <span class="down-ico"><a href="{{ asset('storage/app/'.$user->associate_doc[0]->agreement_letter) }}" download><i class="fa fa-download"></i></a></span>
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
@push('script') 
<script src="{{ asset('public/js/lightbox/jquery.lightbox.js') }}"></script>
<script src="{{ asset('public/js/lightbox/lightbox.js') }}"></script>
@endpush