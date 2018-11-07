@extends('dashboard.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

         {!! $sidebar !!}

        <div class="col-md-9">
            <div class="card text-muted">
                <div class="card-header">
                    <span class="text-muted"><i class="fas fa-users"></i> All Users</span>
                </div>

                <div class="card-body">
                  
                    <div class="row">
                        @foreach ($users as $user)
                        <div class="col-md-4">
                                <div class="card user_card">
                                <div class="text-center" style="padding:20px">
                                    @if($user->image != "")  
                                    <img src="{{ asset($user->image) }}" 
                                    style="width:100px; height:100px; border-radius:50%;" alt="{{ $user->name }}">
                                    @else
                                    <img src="{{ asset('public/defaults/user-male.png') }}"
                                        style="width:100px; height:100px; border-radius:50%;" alt="{{ $user->name }}"> 
                                    @endif   
                                </div>
                                    <p class="name">{{ $user->name }}</p>
                                    <p>{{ $user->created_at->toDateString() }}</p>
                                    <div style="margin: 10px 0;">
                                        <a href="http://{{ $user->facebook }}">
                                            <i class="fab fa-facebook"></i>
                                        </a> 
                                        <a href="http://{{ $user->twitter }}">
                                            <i class="fab fa-twitter"></i>
                                        </a>  
                                        <a href="http://{{ $user->google }}">
                                            <i class="fab fa-google-plus"></i>
                                        </a>  
                                        <a href="http://{{ $user->github }}">
                                            <i class="fab fa-github"></i>
                                        </a> 
                                    </div>
                                    <p>
                                      <a href="{{ route('profile', $user->username) }}">VIEW PROFILE</a>
                                    </p>
                                </div><br>
                        </div>       
                        @endforeach

                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
<style>
        .user_card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 300px;
          margin: auto;
          text-align: center;
          font-family: arial;
        }
        
        .title {
          color: grey;
          font-size: 18px;
        }
        p.name{
            font-weight: bolder;
        }
        
        p a {
          color: wheat;
          text-decoration: none;
          border: none;
          outline: 0;
          display: inline-block;
          padding: 8px;
          background-color: #000;
          text-align: center;
          width: 100%;
          font-size: 18px;
        }
        p a:hover{
          color: white;
          text-decoration: none;
        }    


        a {
          text-decoration: none;
          font-size: 22px;
          color: black;
        }
        
        button:hover, a:hover {
          opacity: 0.7;
        }
        </style>

@endsection