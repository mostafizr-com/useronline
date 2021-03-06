@extends('dashboard.app')
@push('css')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">     
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-lg-2 col-md-12"></div>
            <div class="col-lg-5 col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Name"
                                 class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="username" type="text" placeholder="Username"
                                     class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
    
                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Email address"
                                 class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                                 class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" placeholder="Retype password"
                                 class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
@endsection
