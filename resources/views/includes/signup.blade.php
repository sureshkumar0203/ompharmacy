<div class="popup-container" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6 login-formarea" style="padding:0px;">
        <div class="closesignup"></div>
        <div id="sign-up" class="login_sign_up_popup">
          <div class="sign-up-form">
            <div class="top-sec" >
              <h2>Sign Up</h2>
              {{ Form::open(['url' => '', 'role' => 'form', 'id' => 'user-signup', 'autocomplete' => 'off']) }}
              {!! Form::hidden('verification', '0', ['id' => 'verification']) !!}
              <div class="form-group" style="position:relative"> <span class="input-group-addon cont">+91</span> {!! Form::text('phone', old('phone'), ['onkeypress' => 'return numeric(event)', 'id' => 'phone', 'class'=>'input-medium bfh-phone', 'placeholder'=>'Phone *', 'maxlength' => '10']) !!} </div>
              
              
              {{ Form::button('CONTINUE', array('type' => 'submit', 'class' => 'btn btn-default submit-btn', 'id' => 'user-submit')) }}
              {{ Form::close() }} </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3"></div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
