<div class="forgot-popup-container" style="display:none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6 login-formarea" style="padding:0px;">
        <div class="closeforgot"></div>
        <div id="sign-up" class="login_sign_up_popup">
          <div class="sign-up-form">
            <div class="top-sec">
              <h2>Forgot Password</h2>
              {{ Form::open(['url' => '', 'role' => 'form', 'autocomplete' => 'off', 'id' => 'user-forgot']) }}
              {!! Form::hidden('forgot_verification', '0', ['id' => 'forgot_verification']) !!}
              <div class="form-group" style="position:relative"> <span class="input-group-addon cont">+91</span> {!! Form::text('phone_no', old('phone_no'), ['onkeypress' => 'return numeric(event)', 'id' => 'phone_no', 'class'=>'input-medium bfh-phone', 'placeholder'=>'Phone *', 'maxlength' => '10']) !!} </div>
              {{ Form::button('Send', array('type' => 'submit', 'class' => 'btn btn-default submit-btn', 'id' => 'btn-forgot')) }}
              {{ Form::close() }}
              <div class="bottom-sec">
                <p>You have password ? <a href="javascript:void(0);" class="loginform">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3"></div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
