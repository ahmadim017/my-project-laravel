@extends('layouts.forgetpw')

@section('content')

<div class="row">
    <div class="col-lg-12">
      <div class="p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
          <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
        </div>
               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                                <input id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
