@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content') 
<!-- Start Banner -->
<div class="inner-banner blog">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>Blog</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Banner --> 
<!-- Start Blog -->
<div class="container blog-wrapper padding-lg">
  <div class="row"> 
    <!-- Start Left Column -->
    <div class="col-sm-8 blog-left">
      <ul class="blog-listing">
        @foreach($blogPost as $key=>$blogContent)
        <li>
          <h2><a href="{{ url('/blog') }}/{{ $blogContent->slug }}">{{ $blogContent->title }}</a></h2>
          <a href="{{ url('/blog') }}/{{ $blogContent->slug }}"><img src="{{ asset('public/blog/')}}/{{ $blogContent->image }}" class="img-responsive" alt=""></a>
          <p>{{ str_limit($blogContent->sort_description, 350, '...') }}</p>
          <a href="{{ url('/blog') }}/{{ $blogContent->slug }}" class="read-more"><i class="fa fa-play-circle" style="font-size:20px;color:red"></i> Read More</a> </li>
        @endforeach
      </ul>
      {{ $blogPost->links() }} </div>
    <!-- End Left Column --> 
    
    <!-- Start Right Column -->
    <div class="col-md-4">
      <div class="blog-right">
        <div class="recent-post">
          <h3>Recent Posts</h3>
          <ul>
          @foreach($topBlogs as $key=>$topBlog)
            <li class="clearfix"> <a href="{{ url('/blog') }}/{{ $topBlog->slug }}">
              <div class="img-block"><img src="{{ asset('public/blog/thumb/')}}/{{ $topBlog->image }}" class="img-responsive" alt=""></div>
              <div class="detail">
                <h4>{{ str_limit($topBlog->title, 35, '...') }}</h4>
                <p><i class="fa fa-calendar"></i> <span>{{ date('d M Y' ,strtotime($topBlog->updated_at)) }}</span></p>
              </div>
              </a> 
            </li>
          @endforeach
          </ul>
        </div>
      </div>
    </div>
    <!-- End Right Column --> 
  </div>
</div>
<!-- End Blog --> 
@endsection