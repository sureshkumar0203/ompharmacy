<div class="login-popup-container" style="display: none;">
  <div class="container">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6 login-formarea" style="padding:0px;">
        <div class="closelogin"></div>
        <div class="login_sign_up_popup" id="loginform">
          <div class="login-form">
            <div class="top-sec">
              <h2>Login</h2>
              <span class="log-msg"></span>
              <span class="log-suc"></span>
              {{ Form::open(['url' => '', 'role' => 'form', 'id' => 'user-signin', 'autocomplete' => 'off']) }}
              <div class="form-group"> {!! Form::text('user_email', old('user_email'), ['id' => 'user_email', 'class'=>'form-control', 'placeholder'=>'Email Id/Mobile Number *']) !!} </div>
              <div class="form-group"> {!! Form::password('user_password', ['id' => 'user_password', 'class'=>'form-control', 'placeholder'=>'Password *']) !!} </div>
              <div class="form-group"> <a href="javascript:void(0);" class="forgot-pswd">Forgot Password?</a> </div>
              {{ Form::button('Login', array('type' => 'submit', 'class' => 'btn btn-default submit-btn', 'id' => 'btn-signin')) }}
              {{ Form::close() }}
              <div class="bottom-sec">
              <p>New User ? <a href="javascript:void(0);" class="new-account">Create an Account</a></p>
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