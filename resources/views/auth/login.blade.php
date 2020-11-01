@extends('layouts.app')

@section('headscripts')
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="{{asset('css/form_login_style.css')}}" rel="stylesheet">
@endsection

@section('styles')

<style type="text/css">
    body {
            background: url({{asset("img/login-bg-op.png")}}) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
              background-opacity: 0.3;
        }
</style>

@endsection

@section('content')
<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first mt-3 mb-3">
          <img src="img/user.png" id="icon" alt="User Icon" />
        </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <input id="login" type="text" class="fadeIn second @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Login" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Login'">
            
                @error('email')
            
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            
                @enderror
            
                <input id="password" type="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder='Password'">

                @error('password')
                
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>

                @enderror

                <div class="form-check  mt-2 mb-2">
                    <input class="fadeIn fourth form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                    <button type="submit" class="fadeIn fourth btn-submit">
                        {{ __('Login') }}
                    </button>

                    <div id="formFooter">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>

                        @endif

                    </div>
            </form>
    </div>
</div>
@endsection
