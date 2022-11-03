@extends('admin.layouts.master')
@section('title', "$userDet->first_name $userDet->last_name measurement")
@section('css')

@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left" style="width: 98%;">
        <h3 style="float: left;">{{ $userDet->first_name }} {{ $userDet->last_name }} Pill Management</h3>
        <div class="nav navbar-right panel_toolbox"> <a href="{{ url('administrator/customer') }}" class="btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> Back to List</a> </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ route('pill-management.create') }}/{{ $userDet->id }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Medicine Name</th>
                  <th>Time</th>
                  <th>Days</th>
                  <th>Alert Type</th>
                  @if(auth()->user()->id == 1)
                  <th width="12%">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key=>$val)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $val->medicine }}</td>
                  <td>{{ date("g:i A", strtotime($val->time)) }}</td>
                  <td>{{ $val->days }}</td>
                  <td>@if($val->alert_type == 1) SMS @else CALL @endif</td>
				          @if(auth()->user()->id == 1)
                  <td style="text-align: center">
                      <a class="btn btn-sm btn-primary" href="{{ route('pill-management.edit',$val->id) }}" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['pill-management.destroy', $val->id],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this pill-management ?')"]) !!}
                      {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip', 'data-title' => 'Delete', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
                  </td>
				          @endif
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