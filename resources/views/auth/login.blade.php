<!DOCTYPE html>
<html lang="en">
<div class="bg">
<head>
  @include('layouts.head')
</head>
<div class="container">
    <div class="row">
        <div class="col-md-offset-6 col-md-10 text-center">
            <br><br><br><br><br><br><br>
            <h1 class='text-white display-text-4'>Store CRUD Login Form</h1>
            <div class="form-login"></br>
                </br>
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-white text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                        <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        </div>         
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-white text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <a class="btn btn-secondary" href="/">Return</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                    <i class="fa fa-sign-in"></i>
                                </button>

                                @if (Route::has('password.request'))
                                   <strong><a class="btn btn-primary" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a></strong>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </br></br></br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br>
    <div class="footer text-white text-center">
        <p>© 2018 Unique Login Form. All rights reserved </p>
    </div>
    </div>
<style>
html {
    background-color: #000000;
}

.bg {
    background-image: url("/img/bg.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-color: #000000;
}
</style>
