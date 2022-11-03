@extends('layouts.master')
@section('title', "$blogContent->meta_title")
@section('meta')
<meta name="keyword" content="{{ $blogContent->meta_keyword }}"/>
<meta name="description" content="{{ $blogContent->meta_description }}"/>

<link rel="canonical" href="{{url()->current()}}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $blogContent->title }}" />
<meta property="og:description" content="<?php echo strip_tags($blogContent->sort_description); ?>" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:site_name" content="Bletindia" />
<meta property="article:section" content="Style" />
<meta property="article:published_time" content="<?php echo date("F j, Y h:i A",strtotime($blogContent->created_at)); ?>" />
<meta property="article:modified_time" content="<?php echo date("F j, Y h:i A",strtotime($blogContent->updated_at)); ?>" />
<meta property="og:updated_time" content="<?php echo date("F j, Y",strtotime($blogContent->created_at)); ?>" />
<meta property="og:image" content="{{ asset('public/blog/'.$blogContent->image)}}" />
<meta property="og:image:secure_url" content="{{ asset('public/blog/'.$blogContent->image)}}" />
<meta property="og:image:width" content="2000" />
<meta property="og:image:height" content="1333" />
@endsection
@section('content')
<!-- Start Banner -->
<div class="inner-banner blog">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 blog-details">
        <div class="content">
          <h1>{{ $blogContent->title }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Banner --> 
<!-- Start Blog Detail -->
<div class="container blog-wrapper padding-lg">
  <div class="row"> 
    <!-- Start Left Column -->
    <div class="col-sm-8 blog-left">
      <ul class="blog-listing detail">
        <li>
          <h2>{{ $blogContent->title }}</h2>
          <img src="{{ asset('public/blog/')}}/{{ $blogContent->image }}" class="img-responsive" alt="">
          <ul class="post-detail">
            <li><i class="fa fa-calendar"></i> <span class="bold">{{ date('d M Y' ,strtotime($blogContent->updated_at)) }}</span></li>
            <li>Posted By : <span class="bold">{{ $blogContent->author }}</span></li>
          </ul>
          {!! $blogContent->description !!}
        </li>
      </ul>
      <ul class="follow-us clearfix">
        <li><a href="https://www.facebook.com/sharer.php?u={{ url()->current()}}" title="{{ $blogContent->title }}" onclick="window.open(this.href,this.title,'width=500,height=500,top=200px,left=300px'); return false;" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

        <li><a href="{{ $share['twitter'] }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

        <li><a href="http://www.linkedin.com/shareArticle?url={{ url()->current() }}&title={{ $blogContent->blog_title }}&summary={{ $blogContent->short_description }}&source=LinkedIn" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>

        <li><a href="{{ $share['gplus']  }}" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        
      </ul>
      <div class="comments-wrapper padding-lg">
        <h2>{{ $countComment }} Comments</h2>
        <ul class="row comments">
        @foreach($blogComments as $key=>$blogComment)
          <li class="col-sm-12 clearfix">
            <div class="com-txt">
              <h3>{{ $blogComment->name }} <span>{{ date('M d, Y' ,strtotime($blogComment->updated_at)) }} at {{ date('h:i a' ,strtotime($blogComment->updated_at)) }}</span></h3>
              <p>{{ $blogComment->comment }}</p>
          </li>
        @endforeach
        </ul>
      </div>
      <div class="leave-comment">
        <h4>LEAVE COMMENT</h4>
        {{ Form::open(['url' => '', 'role' => 'form', 'id' => 'blogcomment', 'autocomplete' => 'off']) }}
        {!! Form::hidden('blog_id',$blogContent->id, ['id' => 'blog_id', 'class'=>'form-control']) !!}
          <div class="row clearfix">
            <div class="col-md-6" style="height:60px;">
            {!! Form::text('name', old('name'), ['required', 'placeholder'=>'Full Name *']) !!}
            </div>
            
           <div class="col-md-6" style="height:60px;"> 
            {!! Form::text('email', old('email'), ['required', 'placeholder'=>'Email Address *']) !!}
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="height:170px;"> 
          {!! Form::textarea('comment', old('comment'), ['placeholder'=>'Comment *']) !!}
          
          </div>
          </div>
           
          {{ Form::button('Post Comment <i class="fa fa-play-circle"></i>', array('type' => 'submit', 'class' => 'btn', 'id' => 'comment-submit')) }}
        {{ Form::close() }}
      </div>
    </div>
    <!-- End Left Column --> 
    <!-- Start Right Column -->
    <div class="col-md-4">
      <div class="blog-right">
        <div class="recent-post">
          <h3>Recent Posts</h3>
          <ul>
          @foreach($topBlogs as $key=>$topBlog)
            <li class="clearfix"> 
              <a href="{{ url('/blog') }}/{{ $topBlog->slug }}">
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
<!-- End Blog Detail -->
@endsection
@push('script') 
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> 
@endpush