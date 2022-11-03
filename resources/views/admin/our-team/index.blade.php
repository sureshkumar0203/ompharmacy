@extends('admin.layouts.master')
@section('title', 'Our Team Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Our Team Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ route('our-team.create') }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="8%" style="text-align:center">#</th>
                  <th width="20%">Full Name</th>
                  <th width="25%">Designation</th>
                  <th width="20%">Mobile</th>
                  <th width="15%">Image</th>
                  <th width="12%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($getData as $key=>$data)
                <tr>
                  <td style="text-align:center">{{ $loop->iteration }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->designation }}</td>
                  <td>{{ $data->mobile }}</td>
                  <td align="center"><img src="{{ asset('public/images/our-team') }}/{{ $data->image }}" alt="{{ $data->name }}" style="width: 50%; border-radius: 50%;" /></td>
                  <td style="vertical-align: middle; text-align:center">
                    <a class="btn btn-sm btn-primary" href="{{ route('our-team.edit',$data->id) }}" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['our-team.destroy', $data->id],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this Team Members ?')"]) !!}
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