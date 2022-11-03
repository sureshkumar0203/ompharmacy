@extends('admin.layouts.master')
@section('title', 'Sub Admin Management')
@section('css')
<style>

</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Sub Admin Details Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ url('administrator/subadmin/create') }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%" style="text-align:center">Sl No</th>
                  <th>Sub Admin Name</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th width="20%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($subAdmin as $key=>$getData)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $getData->name }}</td>
                  <td>{{ $getData->email }}</td>
                  <td>{{ $getData->phone_no }}</td>
                  <td style="vertical-align: middle; text-align: center;">
                    <a class="btn btn-sm @if($getData->active == 1) btn-success @else btn-danger @endif" href="{{ url('administrator/subadmin/change-ststus') }}/{{ $getData->id }}" data-toggle="tooltip" data-title="@if($getData->active == 1) Active @else Inactive @endif" @if($getData->active == 1) onClick="return confirm('Are you sure you want to deactive this subadmin ?')" @else onClick="return confirm('Are you sure you want to active this subadmin ?')"@endif>@if($getData->active == 1) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</a>

                    <a class="btn btn-sm btn-info" href="{{ url('administrator/subadmin',$getData->id) }}/permit" data-toggle="tooltip" data-title="Permit"><i class="fa fa-lock" ></i></a>
                    <a class="btn btn-sm btn-primary" href="{{ url('administrator/subadmin',$getData->id) }}/edit" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    <a class="btn btn-sm btn-danger" href="{{ url('administrator/subadmin',$getData->id) }}/delete" onClick="return confirm('Are you sure you want to delete this Sub admin ?')" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash"></i></a>
                  </td>
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