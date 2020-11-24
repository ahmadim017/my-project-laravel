@extends('layouts.login')

@section('content')

          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                </div>
                @if (session('status'))
                <div class="alert alert-warning">
                    {{session('status')}}
                </div>
                @endif
<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
@csrf
<div class="form-group">
<label for="email" class="col-sm-12 colform-label pl-0">{{ __('E-Mail Address') }}</label>
<br>
<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>@if ($errors->has('email'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
<div class="form-group">
<label for="password" class="col-md-4 col-form-label text-md-left pl-0">{{ __('Password') }}</label>
<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
@if ($errors->has('password'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>
<div class="form-group">
<div class="checkbox">
<input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> 
<label for="remember">{{ __('Remember Me') }}</label>
</div>
</div>
<div class="form-group">
<button type="submit" class="btn-block btn btn-primary">{{ __('Login') }}</button>
<br>
<a class="btn btn-link pl-0" href="{{route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
</div>
</form>
</div>
</div>
@endsection
