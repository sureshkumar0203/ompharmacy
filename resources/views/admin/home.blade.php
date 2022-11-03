@extends('admin.layouts.master')
@section('title', 'Admin Home')
@section('content')
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12"><br><br>
      <h1 style="text-align:center;">WELCOME TO @if(Auth::user()->id == 1) DASHBOARD @else SUB ADMIN @endif</h1>
    </div>
  </div>
</div>
@endsection
