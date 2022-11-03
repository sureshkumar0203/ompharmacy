@extends('layouts.master')
@section('title', 'OM Healthcare Enterprise Limited')
@section('content')
<div class="container mtb200" id="myaccount">
	<div class="row">
		@include('includes.usermenu')
		<div class="col-md-9">
			<div class="myaccount-box">
				<div class="container mb40 form-wrapper">
					<div class="row"><h5>Add Money</h5></div>
					<div class="container">
						<a href="{{ url('/user-payment-process') }}" class="btn btn-primary btn-sm paynow">Paynow</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection