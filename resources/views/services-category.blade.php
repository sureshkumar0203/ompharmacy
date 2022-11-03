@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('style')
<link href="{{ asset('public/css/filter/jplist.core.min.css') }} "rel="stylesheet" type="text/css" />
<link href="{{ asset('public/css/filter/jplist.filter-toggle-bundle.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/css/filter/jplist.jquery-ui-bundle.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/css/filter/jplist.textbox-filter.min.css') }}" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.0-rc.1/themes/smoothness/jquery-ui.css" /> -->
<link rel="stylesheet" href="{{ asset('public/css/alert/jquery-confirm.min.css') }}">
@endsection
@section('content') 
<!-- Start Banner Carousel -->
<!-- Start Banner -->
<div class="inner-banner about-us-banner" @if($cms_page->banner_img !='') style="background-image:url('{{ url('public/images/services/banner') }}/{{ $cms_page->banner_img }}')" @endif>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
          <h1>{{ $cms_page->title }}</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Banner --> 
<!-- Start About Section -->
<section class="paddingd-lg pad0 mtb30">
  <div class="container">
    <div id="demo" class="box jplist">
      <div class="jplist-panel box panel-top">
        
        @if(count($getServices) >20 )
        <div class="product-filter" style="margin-bottom:30px;" >
          <div class="row">
            <div class="jplist-ios-button"> <i class="fa fa-sort"></i>jPList Actions </div>
            <div class="col-md-2">
              <div class="jplist-drop-down" data-control-type="items-per-page-drop-down" data-control-name="paging" data-control-action="paging" style="height:40px; margin-left:10px;">
                <div class="jplist-dd-panel" style="line-height:40px;"> 30 Per Page </div>
                <ul>
                  <li class="active"><span data-number="30" data-default="true"> 30 Per Page </span></li>
                  <li><span data-number="40"> 60 Per Page </span></li>
                  <li><span data-number="60"> 90 Per Page </span></li>
                  <li><span data-number="all"> View All </span></li>
                </ul>
              </div>
            </div>
            <div class="col-md-10">
              <div class="text-filter-box"> <i class="fa fa-search  jplist-icon" style="height:40px; line-height:40px;"></i>
                <input data-path=".title" type="text" value="" placeholder="By Product Name" data-control-type="textbox" data-control-name="title-filter" data-control-action="filter" style="height:40px;">
              </div>
            </div>
            <div><br>
              <br>
            </div>
          </div>
        </div>
        @endif
        <div class="row list box text-shadow"> 
          @if($avalable == 1)
            @if(count($getServices) > 0)
            @foreach($getServices as $val)
            <div class="col-sm-4 mb20 service">
              <div class="card">
                <div class="card-body">
                 <span class="sho" id="show_div{{ $val->id }}" style="display:none;">
                 <a href="javascript:void(0);"  onClick="hideDescription({{ $val->id }});" class="note-clc">
                 <i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
                  {!! $val->shot_description !!}
                  
                   
                  </span>
                  <h5 class="card-title card-title-head title">{{ $val->name }}</h5>
                  <p class="nt"><strong>Note :</strong> 
                  {!! str_limit(strip_tags($val->shot_description), 200) !!} 
                
                  
                  <a href="javascript:void(0);" onClick="dispDescription({{ $val->id }});">More...</a> 
                         
                  </p>
                  
                  
                  <div class="book-id">#{{ $val->test_id }}</div>
                  <div class="clearfix"></div>
                  <div class="book-area">
                    <h5>&#8377; {{ $val->sale_price }}</h5>
                    <a href="javascript:void(0)" @if(Session::get('userId') != "") onclick="checkremaining('{{ $val->id }}')" @endif class="btn btn-primary btn-sm book-btn @if(Session::get('userId') == "") loginform @endif">{{ $cms_page->btn_name }}</a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              
              
                
    
              
              
            </div>
            @endforeach
            @else
            <div class="col-md-12 not-avalable mtb50">
              <h4 class="no-service text-center"> No Records found</h4>
            </div>
            @endif
          @else
          <div class="col-md-12 not-avalable text-center mtb50" >
            <h4 class="no-service">No services taken at this time.<br>This services at avalable {{ date("g:i A", strtotime($cms_page->from_time)) }} TO {{ date("g:i A", strtotime($cms_page->to_time)) }} </h4>
          </div>
          @endif
        </div>
        <div class="row">
          <div class="box jplist-no-results text-shadow text-center jplist-hidden">
            <p>No results found</p>
          </div>
        </div>
        @if(count($getServices) >20 )
        <div class="row">
          <div class="col-sm-6 text-left">
            <div class="jplist-label" data-type="Page {current} of {pages}" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging"> </div>
          </div>
          <div class="col-sm-6 text-right">
            <div class="jplist-pagination" data-control-type="pagination" data-control-name="paging" data-control-action="paging" > </div>
          </div>
        </div>
        @endif 
      </div>
      @if($cms_page->adv_img !='')
      <div class="row">
        <div class="col-md-12"> <img src="{{ asset('public/images/services/advertisement') }}/{{ $cms_page->adv_img }}"> </div>
      </div>
      @endif </div>
  </div>
  </div>
</section>
@endsection
@push('script')
 


<script src="{{ asset('public/js/filter/jplist.core.min.js') }}"></script> 
<script src="{{ asset('public/js/filter/jplist.sort-bundle.min.js') }}"></script> 
<script src="{{ asset('public/js/filter/jplist.textbox-filter.min.js') }}"></script> 
<script src="{{ asset('public/js/filter/jplist.pagination-bundle.min.js') }}"></script> 
<script src="{{ asset('public/js/filter/jplist.history-bundle.min.js') }}"></script> 
<script src="{{ asset('public/js/filter/jplist.filter-toggle-bundle.min.js') }}"></script> 
<!-- <script  src="http://code.jquery.com/ui/1.12.0-rc.1/jquery-ui.min.js"></script>  -->
<script src="{{ asset('public/js/filter/jplist.jquery-ui-bundle.min.js') }}"></script>
<script src="{{ asset('public/js/alert/jquery-confirm.min.js') }}"></script>

<script>
function dispDescription(id){
   $("#show_div"+id).show();
}

function hideDescription(id){
   $("#show_div"+id).hide();
}
	 
$('document').ready(function () {
	jQuery.fn.jplist.settings = {
};
$('#demo').jplist({
	itemsBox: '.list'
    , itemPath: '.service'
    , panelPath: '.jplist-panel'
    , redrawCallback: function (collection, $dataview, statuses) {
    $.each(statuses, function (index, status) {
    //console.log(status);
    });
    }
});
});
</script>
@endpush