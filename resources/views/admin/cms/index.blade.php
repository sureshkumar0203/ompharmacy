@extends('admin.layouts.master')
@section('title', 'CMS Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>CMS Management</h3>
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
                  <th width="5%" style="text-align:center">#</th>
                  <th width="20%">Page Name</th>
                  <th width="65%">Content</th>
                  <th width="12%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key=>$content)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $content->title }}</td>
                  <td>{!! str_limit($content->content, 300, '...') !!}</td>
                  <td style="vertical-align: middle; text-align: center">
                    <a class="btn btn-sm btn-primary" href="{{ url('administrator/page-content',$content->id) }}/edit" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    <!-- {!! Form::open(['method' => 'DELETE','url' => ['administrator/page-content', $content->id],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this CMS ?')"]) !!}
                      {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-sm btn-danger', 'data-toggle' => 'tooltip', 'data-title' => 'Delete', 'type'=>'submit']) !!}
                    {!! Form::close() !!} -->
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