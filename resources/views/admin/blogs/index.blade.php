@extends('admin.layouts.master')
@section('title', 'Blog Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Blog Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox">
              <a href="{{ route('blogs.create') }}" class="btn btn-info">Add New</a>
            </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th width="5%" style="text-align:center">#</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Sort Description</th>
                  <th width="15%">Author</th>
                  <th width="12%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($blogs as $key=>$blog)
                <tr>
                  <td style="text-align:center">{{ $key+1 }}</td>
                  <td><img src="{{ asset('public/blog/thumb') }}/{{ $blog->image }}" alt="" /></td>
                  <td>{{ str_limit($blog->title, 150, '...') }}</td>
                  <td>{{ str_limit($blog->sort_description, 200, '...') }}</td>
                  <td>{{ $blog->author }}</td>
                  <td style="vertical-align: middle; text-align:center">
                    <a class="btn btn-sm btn-primary" href="{{ route('blogs.edit',$blog->id) }}" data-toggle="tooltip" data-title="Edit"><i class="fa fa-edit" ></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['blogs.destroy', $blog->id],'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this Blog ?')"]) !!}
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