@extends('admin.layouts.master')
@section('title', 'Category Content Management')
@section('css')
<style>
.myul{
  list-style: none;
}
/* .mb20{
  margin-bottom: 20px;
} */
.wi80 {
    width: 80%;
    padding: 10px 10px;
    cursor: pointer;
    background: #314559;
    color: #fff;
    font-weight: bold;
    padding-left: 30px;
}
.myul li {
    background: #eee;
    margin: 10px 0px;
}
.action {
    width: 20%;
    line-height: 38px;
    text-align: center;
    background: #314559;
}
ul.myul li .myul {
    display: none;
    margin-left: 50px;
}
#accordian ul ul li span, #accordian ul ul li .action {
    background: #314559ba;
}
#accordian ul ul ul li span, #accordian ul ul ul li .action {
    background: #63728180;
}

#accordian {
  color: white;
}
#accordian h3 {
  background: #003040;
  background: linear-gradient(#003040, #002535);
  color:#fff;
  font-size: 13px;
  text-decoration: none;
}
#accordian h3 a {
  padding: 0 10px;
  font-size: 12px;
  line-height: 34px;
  display: block;
  color: white;
  text-decoration: none;
}
#accordian h3:hover {
  text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
}

#accordian a h3 {
  padding: 0 10px;
  font-size: 12px;
  line-height: 34px;
  display: block;
  color: white;
  text-decoration: none;
}
#accordian h3:hover {
  text-shadow: 0 0 1px rgba(255, 255, 255, 0.7);
}

#accordian li {
  list-style-type: none;
  position:relative;
}


#accordian ul ul {
  display: none;
}
#accordian li.active>ul {
  display: block;
  padding-bottom: 1px;
}
#accordian ul ul ul {
  margin-left: 15px;
  border-left: 1px dotted rgba(0, 0, 0, 0.5);
}
#accordian dt:not(:only-child):after {
  content: "\f0fe";
  font-family: fontawesome;
  position: absolute;
  left: 10px;
  top: 0;
  font-size: 14px;
  top: 10px;
}
#accordian .active>dt:not(:only-child):after {
  content: "\f146";
}
</style>
@endsection
@section('content')
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Category Content Management</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <div class="nav navbar-right panel_toolbox"> <a href="{{ route('cms-page.create') }}" class="btn btn-info">Add New</a> </div>
            <div class="clearfix"></div>
          </div>
          @include('admin.includes.msg')
          <div class="x_content" id="accordian">
            @php
            $res = fetchCategoryTreeList();
            foreach ($res as $r) {
              echo  $r;
            }
            @endphp
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('script') 
<script>
$(document).ready(function() {
    $("#accordian dt").click(function() {
        var link = $(this);
        var closest_ul = link.closest("ul");
        var parallel_active_links = closest_ul.find(".active")
        var closest_li = link.closest("li");
        var link_status = closest_li.hasClass("active");
        var count = 0;         
        closest_ul.find("ul").slideUp(function() {
            if (++count == closest_ul.find("ul").length)
                parallel_active_links.removeClass("active");
        });         
        if (!link_status) {
            closest_li.children("ul").slideDown();
            closest_li.addClass("active");
        }
    })
 }) 
</script> 
@endpush