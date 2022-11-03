@extends('layouts.master')
@section('title', "$cms->meta_title")
@section('meta')
<meta name="keyword" content="{{ $cms->meta_keywords }}"/>
<meta name="description" content="{{ $cms->meta_description }}"/>
@endsection
@section('content')
<div class="inner-banner about-us-banner">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>{{ $cms->title }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="your-teeth padding-lg pad-top-bot50">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        {!! $cms->content !!} 
      </div>
    </div>
  </div>
</section>
@endsection
@push('script')
@endpush