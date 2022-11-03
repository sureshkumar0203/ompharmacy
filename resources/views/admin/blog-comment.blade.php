@extends('admin.layouts.master')
@section('title', 'Blog Comment Management')
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Blog Comment Management</h3>
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
                  <th>Blog Name</th>
                  <th width="15%">Name</th>
                  <th>E-mail</th>
                  <th>comment</th>
                  <th width="12%">Date</th>
                  <th width="12%" style="text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($blogComments as $key=>$blogComment)
                <tr>
                  <td style="text-align:center">{{ $key+1 }}</td>
                  <td>{{ $blogComment->blog->title }}</td>
                  <td>{{ $blogComment->name }}</td>
                  <td>{{ $blogComment->email }}</td>
                  <td>{{ $blogComment->comment }}</td>
                  <td>{{ date('d M, Y' ,strtotime($blogComment->created_at)) }}</td>
                  <td style="vertical-align: middle; text-align:center">
                    <a class="btn btn-xs @if($blogComment->status == 1) btn-success @else btn-danger @endif" href="{{ url('administrator/change-ststus') }}/{{ $blogComment->id }}" data-toggle="tooltip" data-title="@if($blogComment->status == 1) Active @else Inactive @endif">@if($blogComment->status == 1) Active @else Inactive @endif</a>
                    {!! Form::open(['method' => 'GET', 'url' => ['administrator/blog-comment', $blogComment->id,'delete'], 'style'=>'display:inline','onClick'=>"return confirm('Are you sure you want to delete this Comment ?')"]) !!}
                      {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-xs btn-danger', 'data-toggle' => 'tooltip', 'data-title' => 'Delete', 'type'=>'submit']) !!}
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