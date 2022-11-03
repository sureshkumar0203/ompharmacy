@extends('admin.layouts.app')
@section('title', 'Reset Password')
@section('content')
<section class="login_content">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form class="form-horizontal" data-parsley-validate method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <h1>Reset Password</h1>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}" style="height:60px;">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus style="margin-bottom:0px;">
            @if ($errors->has('email'))
            <span class="help-block" style="float: left;margin: 0;">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div>
            <button type="submit" class="btn btn-default submit" style="float:left;">Send Password Reset Link</button>
        </div>
        <div class="clearfix"></div>
        <div class="separator">
            <p class="change_link">You have password ?
              <a href="{{ url('/login') }}" class="to_register"> Log in </a>
            </p>
        </div>
    </form>
</section>
@endsection