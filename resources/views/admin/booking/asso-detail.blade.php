@extends('admin.layouts.master')
@section('title', "Associate Detail")
@section('css')

@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left" style="width: 98%;">
        <h3 style="float: left;">{{ $bookDetail->user_det->first_name }} {{ $bookDetail->user_det->last_name }} (BOOKING ID #{{ $bookDetail->id }})</h3>
        <div class="nav navbar-right panel_toolbox"> <a href="{{ url('administrator/booking') }}" class="btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> Back to List</a> </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Associate Name</th>
                  <th>Associate Email</th>
                  <th>Associate Contact No</th>
                </tr>
              </thead>
              <tbody>
                @foreach($asso_name_arry as $key=>$data)

                @php
                  $explodeValue = explode('/', $data);
                  $name = $explodeValue[0];
                  $email = $explodeValue[1];
                  $phone = $explodeValue[2];
                @endphp
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td @if($bookDetail->req_acpt_id == $key) style="background: #37a200;color: #fff;" @endif>{{ $name }}</td>
                  <td>{{ $email }}</td>
                  <td>{{ $phone }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script')
<script src="{{ asset('public/admin/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/admin/js/dataTables.bootstrap.min.js') }}"></script>
@endpush