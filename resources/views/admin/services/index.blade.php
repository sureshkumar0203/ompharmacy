@extends('admin.layouts.master')
@section('title', 'Services Management')
@section('css')
<style>
span.wallet {
   color: #000000;
    font-weight: bold;
    background: #f3c005;
    padding: 0px 8px;
    display: block;
}
span.time {
    background: #006b48;
    display: block;
    color: #fff;
    padding: 0px 9px;
    font-weight: bold;
}
</style>
@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Services Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ route('services.create') }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%" style="text-align:center">#</th>
                  <th width="10%">Service Name</th>
                  <th width="10%">Service Id</th>
                  <th width="38%">Name</th>
                  <th width="10%">Price</th>
                  <th width="15%">Service Time</th>
                  <th width="12%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key=>$value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->cms_page->title }}</td>
                  <td># {{ $value->test_id }}</td>
                  <td>{{ $value->name }}</td>
                  <td><span class="wallet">&#8377; {{ $value->sale_price }}</span></td>
                  <td><span class="time">After {{ str_pad($value->hour, 2, "0", STR_PAD_LEFT) }} : {{ str_pad($value->minute, 2, "0", STR_PAD_LEFT) }} Hrs</span></td>
                  <td style="vertical-align: middle; text-align:center">
                    <a class="btn btn-sm btn-primary" href="{{ route('services.edit',$value->id) }}" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['services.destroy', $value->id],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this Services ?')"]) !!}
                      {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip', 'data-title' => 'Delete', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
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