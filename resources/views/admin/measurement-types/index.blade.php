@extends('admin.layouts.master')
@section('title', 'Measurement Management')
@section('css')

@stop
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Measurement Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ route('measurement-types.create') }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="10%" style="text-align:center">#</th>
                  <th width="10%">Measurement Types</th>
                  <th width="10%">Unit</th>
                  <th width="12%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key=>$value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->types }}</td>
                  <td>{{ $value->type_unit }}</td>
                  <td style="vertical-align: middle; text-align: center">
                    <a class="btn btn-sm btn-primary" href="{{ route('measurement-types.edit',$value->id) }}" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['measurement-types.destroy', $value->id],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this Data ?')"]) !!}
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