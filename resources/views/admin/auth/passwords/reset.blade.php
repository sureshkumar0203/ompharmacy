@extends('admin.layouts.app')
@section('title', 'Reset Password')
@section('content')
<section class="login_content">
    <form class="form-horizontal" data-parsley-validate method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <h1>Reset Password</h1>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}" style="height:60px;">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus style="margin-bottom:0px;">
            @if ($errors->has('email'))
            <span class="help-block" style="float: left;margin: 0;">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="{{ $errors->has('password') ? ' has-error' : '' }}" style="height:60px;">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required style="margin-bottom:0px;">
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" style="height:60px;">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required style="margin-bottom:0px;">
            @if($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            @endif
        </div>
        <div>
            <button type="submit" class="btn btn-default submit" style="float:left;">Reset Password</button>
        </div>
    </form>
</section>
@endsection