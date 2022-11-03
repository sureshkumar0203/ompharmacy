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
                    
					    @if (Session::has('success'))
                          <div class="alert alert-success fadeout"> {{ Session::get('success') }} </div>
                        @endif
            
                        @if (Session::has('error'))
                          <div class="alert alert-danger fadeout"> {{ Session::get('error') }} </div>
                        @endif
					    
                        
                        @if($userDet->address!="" && $userDet->pincode!="")
                        {{ Form::open(['url' => 'add-money', 'role' => 'form', 'id' => 'add-money', 'autocomplete' => 'off']) }}
                        <div class="row">
                        <div class="col-md-9">
						   <div class="col-sm-1 pull-left"><i class="fa fa-inr money-add" aria-hidden="true"></i></div>
						   <div class="col-sm-11 pull-right">
    					    {!! Form::text('amount', old('amount'), ['onkeypress' => 'return numeric(event)', 'required', 'id'=>'amount', 'maxlength'=>'6', 'placeholder'=>'Enter Amount *']) !!}</div>
							</div>
    					   <div class="col-md-3"> 
                            
                            {{ Form::submit('SUBMIT', array('type' => 'submit', 'class' => 'btn btn-sm btn-success btn-send add-money-submit', 'id' => 'contact-submit')) }}
                            </div>
                            
                            
                            </div>
    					{{ Form::close() }}
                        @else
                        <span style="color:#F00; font-size:17px;"><strong>Note :</strong> <a href="{{ url('/myaccount') }}">Click Here</a> to update your address & pincode for adding money in wallet.</span>
                        @endif
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection