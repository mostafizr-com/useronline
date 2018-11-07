@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

         {!! $sidebar !!}

        <div class="col-md-9">
            <div class="card">

                <div class="card-header">
                    <span class="text-muted"><i class="fas fa-user-tie"></i> 
                      {{ $user->username }}'s Profile

                      @if (Auth::user()->username == $user->username)
                      <a class="btn btn-success btn-sm float-right"
                       href="{{ route('profile.edit', Auth::user()->username ) }}">
                        EDIT
                      </a>                          
                      @endif


                    </span>
                </div>
                 <br>


                <div class="card-body">
                   
                    <div class="row">
                            <div class="col-sm-5"><!--left col-->
                                                
                            <div class="card-body text-center bg-success">
                                @if($user->image != "")  
                                <img class="user-profile-avater img-thumbnail" 
                                src="{{ asset($user->image) }}">
                                @else
                                <img class="user-profile-avater  img-thumbnail" 
                                src="{{ asset('public/defaults/user-male.png') }}"> 
                                @endif  
                            </div>
                            
                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="text-muted text-center card-footer">
                                        {{ $user->name }}</h5>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-sm">FOLLOW</button>
                                <button class="btn btn-success btn-sm">SEND MESSAGE</button>
                                </div>     
                            

                            <div class="card-footer text-center">
                                <a style="color:#4867AA" target="_blank" href="">
                                <i class="fab fa-facebook fa-2x"></i> 
                                </a>
                                
                                <a style="color:#00ACED" target="_blank" href="">
                                <i class="fab fa-twitter fa-2x"></i> 
                                </a>
                                
                                <a style="color:#DC483C" target="_blank" href="">
                                <i class="fab fa-google-plus fa-2x"></i> 
                                </a>

                                <a style="color:#24292E" target="_blank" href="">
                                <i class="fab fa-github fa-2x"></i>
                                </a>
                            </div> 

                            <br>

                                
                            <ul class="list-group">
                                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                                <li class="list-group-item"><strong>Shares</strong><span class="float-right">125</span></li>
                                <li class="list-group-item"><strong>Likes</strong><span class="float-right"> 13</span></li>
                                <li class="list-group-item"><strong>Posts</strong><span class="float-right"> 37</span></li>
                                <li class="list-group-item"><strong>Followers</strong><span class="float-right"> 78</span></li>
                            </ul> 
                            <br>
                            
                        </div><!--/col-3-->



                        <div class="col-sm-7">
                        
                        <div class="card"> 
                            <h6 class="card-header text-muted">
                                Account
                            </h6> 
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-3">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="username" 
                                        class="form-control form-control-sm disabled" 
                                        value="{{ $user->username }}" disabled>
                                    </div>
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="name">Full name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="name" 
                                            class="form-control form-control-sm disabled" 
                                            value="{{ $user->name }}" disabled>
                                        </div>
                                    </div>  
                                </div>
                    
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="email" 
                                            class="form-control form-control-sm disabled" 
                                            value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>  
                                </div>

                            </div> 
                        </div>  
              <br>
                        
                        <div class="card">
                            <h6 class="card-header text-muted">
                                Brief
                            </h6> 
                            <div class="card-body">
                                {{ $user->userbrief }}
                            </div>
                            
                        </div> 
               <br>         
                        
                        @if (Auth::user()->username == $user->username)
                        <a class="btn btn-success float-left"
                         href="{{ route('profile.edit', Auth::user()->username ) }}">
                          EDIT
                        </a>                          
                        @endif
            
                        
                        </div><!--/col-7-->

                    </div><!--/row-->

                    
             </div>

            </div>
        </div>


    </div>
</div>
@endsection