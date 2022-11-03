@extends('admin.layouts.master')
@section('title', 'Videmo Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Videmo Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ route('video.create') }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%" style="text-align:center">#</th>
                  <th>Video</th>
                  <th width="20%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($videos as $key=>$video)
                <tr>
                  <td style="text-align:center">{{ $key+1 }}</td>
                  <td style="text-align: center;">
                    <video width="300" controls>
                      <source src="{{ asset('public/video') }}/{{ $video->video }}" type="video/mp4">
                    </video>
                  </td>
                  <td  style="vertical-align: middle; text-align: center;">
                    <a class="btn btn-sm btn-primary" href="{{ route('video.edit',$video->id) }}" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['video.destroy', $video->id],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this Video ?')"]) !!}
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