@extends('admin.layouts.app')
@section('title', 'Admin Login')
@section('content')
<section class="login_content">
    <img src="{{ asset('public/admin/images/logo-lrg.png') }}" alt="">
    <form class="form-horizontal" data-parsley-validate method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h1>Admin Login</h1>
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
        <div>
            <button type="submit" class="btn btn-default submit" style="float:left;">Login</button>
            <a class="" style="float:right;" href="{{ route('password.request') }}">Forgot Your Password?</a>
        </div>
    </form>
</section>
@endsection