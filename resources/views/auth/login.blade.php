@extends('dashboard.app')

@push('css')
  <link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">  
   <link rel="stylesheet" href="{{ asset('public/css/checkbox2.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-2 col-md-12"></div>
        <div class="col-lg-5 col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
            
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
            
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email address"
                                 class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                 name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12"> 
                                <div class="form-check">
                                    <label>
                                        <input type="checkbox" name="remember" 
                                        class="form-check-input" id="remember" 
                                            {{ old('remember') ? 'checked' : '' }}> 
                                        <span class="label-text">{{ __('Remember Me') }}</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
               <br>
            </div>
            <div class="col-lg-3 col-md-12">

                    <div class="text-center text-muted card-header">OR</div>
                    <br>

                    <a class="btn btn-block btn-social btn-facebook" href="{{ route('social.login', 'facebook') }}">
                        <span class="fab fa-facebook"></span> Continue with facebook
                    </a>
                            
                    {{-- <a class="btn btn-block btn-social btn-twitter" href="{{ route('social.login', 'twitter') }}">
                        <span class="fab fa-twitter-square"></span> Continue with Twitter
                    </a>  --}}

                    <a class="btn btn-block btn-social btn-google" href="{{ route('social.login', 'google') }}">
                        <span class="fab fa-google-plus-square"></span> Continue with Google
                    </a> 

                    <a class="btn btn-block btn-social btn-github" href="{{ route('social.login', 'github') }}">
                        <span class="fab fa-github-square"></span> Continue with Github
                    </a>

                    <br><br>                
            </div> 

            <div class="col-lg-2 col-md-12"></div>
        </div>
    </div>
</div>
@endsection
