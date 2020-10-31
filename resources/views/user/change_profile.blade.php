@extends('layouts.app')

@section('headscripts')
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="{{asset('css/form_login_style.css')}}" rel="stylesheet">
@endsection


@section('content')
<div class="wrapper fadeInDown">
     @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div id="formContent">
        <div class="fadeIn first mt-3 mb-3">
          <h3>Modificati datele</h3>
        </div>
    <form method="POST" action="{{ route('update_profile') }}" enctype="multipart/form-data">
        @csrf

    <input id="first_name" value="{{Auth::user()->first_name}}" type="text" class="fadeIn second @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name"  placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder='First Name'">

    @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="last_name" value="{{Auth::user()->last_name}}" type="text" class="fadeIn second @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder='Last Name'">

    @error('last_name')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="address"  value="{{Auth::user()->address}}"type="text" class="fadeIn second @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder='Address'">

    @error('address')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <input id="phone" value="{{Auth::user()->phone_number}}" type="text" class="fadeIn third @error('address') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder='Phone'">

    @error('phone')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

        <button type="submit" class="fadeIn fourth btn-submit">
            {{ __('Register') }}
        </button>
    </form>
    </div>
</div>

@endsection
