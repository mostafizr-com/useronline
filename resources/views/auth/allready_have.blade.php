@extends('dashboard.app')
@push('css')
<link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">      
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 col-md-12">
                            <h5>It seems already a acount with 
                                <strong class="text-muted">{{ $email }}</strong> associated with 
                                <strong>{{ $method }}</strong>.
                            </h5>

                            <a class="btn btn-block btn-social btn-{{ $method }}" href="{{ route('social.login', $method) }}">
                                <span class="fab fa-{{ $method }}"></span> Continue with {{ $method }}
                            </a>             
                        </div> 
                        <div class="col-lg-3"></div>
                    </div>


                    <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <br>
                        <h3 class="card-header text-center">
                            Or
                        </h3>
                        <br>
                         
                        <p>update the acount with 
                            <strong>{{ $auth_method }}</strong>
                             informations</p>

                        <form method="POST" action="{{ route('update.social.info') }}">
                            @csrf
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $name }}" required autofocus>
    
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <input type="hidden" name="image" value="{{ $image }}">
                            <input type="hidden" name="auth_method" value="{{ $auth_method }}">
    
                            <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $username }}" required autofocus>
        
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>
    
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form> 
                    </div> 
                    <div class="col-md-3"></div>
                    </div>
    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
