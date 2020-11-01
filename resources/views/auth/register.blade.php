@extends('layouts.app')

@section('headscripts')
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="{{asset('css/form_login_style.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="wrapper fadeInDown">
    <div id="formContent">
        <div class="fadeIn first mt-3 mb-3">
          <h3>Register</h3>
        </div>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

    <input id="first_name" type="text" class="fadeIn second @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"  placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder='First Name'">

    @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="last_name" type="text" class="fadeIn second @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder='Last Name'">

    @error('last_name')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="address" type="text" class="fadeIn second @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder='Address'">

    @error('address')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="phone" type="text" class="fadeIn third @error('address') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder='Phone'">

    @error('phone')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="email" type="email" class="fadeIn third @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder='Email'">

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="password" type="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder='Password'">

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="password-confirm" type="password" class="fadeIn third" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder='Confirm Password'">

        <div class="form-group row-ml-2">
            <label for="self_photo" class="col-md-4 col-form-label text-md-right">{{ __('Picture of your ID') }}</label>

                <input type="file"
                       id="self_photo" name="self_photo" required autofocus
                       accept="image/png, image/jpeg">

                @error('self_photo')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group row-ml-2">
            <label for="id_photo" class="col-md-4 col-form-label text-md-right">{{ __('Picture of you') }}</label>

                <input type="file"
                       id="id_photo" name="id_photo" required autofocus
                       accept="image/png, image/jpeg">

                @error('id_photo')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

                <button type="submit" class="fadeIn fourth btn-submit">
                    {{ __('Register') }}
                </button>
    </form>
    </div>
</div>

@endsection
