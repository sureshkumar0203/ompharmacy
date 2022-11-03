@extends('admin.layouts.master')
@section('title', 'Associate Registration Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Associate Registration Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ url('administrator/associate-registration/create') }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%" style="text-align:center">#</th>
                  <th>Associate ID</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Phone no</th>
                  <th>Address</th>
                  <th width="32%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($labsUsers as $key=>$labsUser)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $labsUser->associate_id }}</td>
                  <td>{{ $labsUser->name }}</td>
                  <td>{{ $labsUser->email }}</td>
                  <td>{{ $labsUser->phone_no }}</td>
                  <td>{{ $labsUser->address }}</td>
                  <td style="vertical-align: middle; text-align:center">
                    <a href="javascript:void(0)" style="padding: 5px 8px;" class="btn btn-sm btn-info collect defult-access" data-toggle="tooltip" data-title="Request Sent excluding cancelled booking"><b>S</b> - {{ associateSentRequest($labsUser->id) }}</a>
                    <a href="javascript:void(0)" style="padding: 5px 8px;" class="btn btn-sm btn-dark collect defult-access" data-toggle="tooltip" data-title="Request Accepted"><b>A</b> - {{ associateAcceptRequest($labsUser->id) }}</a>
                    <a href="javascript:void(0)" style="padding: 5px 8px;" class="btn btn-sm btn-warning collect defult-access" data-toggle="tooltip" data-title="Request not Accepted"><b>N</b> - {{ requestNotAccepted($labsUser->id) }}</a>

                    <a class="btn btn-sm @if($labsUser->active == 1) btn-success @else btn-danger @endif" href="{{ url('administrator/associate-registration/change-ststus') }}/{{ $labsUser->id }}" data-toggle="tooltip" data-title="@if($labsUser->active == 1) Active @else Inactive @endif" @if($labsUser->active == 1) onClick="return confirm('Are you sure you want to deactive this associate ?')" @else onClick="return confirm('Are you sure you want to active this associate ?')"@endif>@if($labsUser->active == 1) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</a>

                    <a class="btn btn-sm btn-primary" href="{{ url('administrator/associate-registration',$labsUser->id) }}/edit" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    <a class="btn btn-sm btn-warning" href="{{ url('administrator/associate-registration',$labsUser->id) }}/view" data-toggle="tooltip" data-title="view"><i class="fa fa-eye" ></i></a>
                    {!! Form::open(['method' => 'GET','url' => ['administrator/associate-registration', $labsUser->id,'delete'],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this Associate ?')"]) !!}
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