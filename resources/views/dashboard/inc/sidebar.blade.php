<div class="col-md-3">

    <div class="card-body">
                        
        <a class="dropdown-item" href="{{ route('allusers') }}">
            <span class="text-muted"><i class="fas fa-users"></i> All users</span>
        </a>

        <div class="dropdown-divider"></div>
 
        <a class="dropdown-item" href="#">
            <span class="text-muted"><i class="fas fa-rss"></i>  My articles</span>
        </a>

    </div>

<br>

    <div class="card-header">
        <span class="text-muted">Blog options</span>
    </div>
    <div class="card-body">
        <a class="dropdown-item" href="{{ route('tag.index') }}">
            <span class="text-muted"><i class="fas fa-tags"></i> Tags</span>
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="{{ route('category.index') }}">
            <span class="text-muted"><i class="fas fa-folder-open"></i> Category</span>
        </a>

        <div class="dropdown-divider"></div>

        <a class="dropdown-item" href="{{ route('post.index') }}">
            <span class="text-muted"><i class="fas fa-edit"></i> Article</span>
        </a>
    </div>       
<br>



    <h6 class="card-header">Users are online</h6>
    <div class="card-body">  
        @foreach ($users as $user)
        @if ($user->is_online())
          <a class="dropdown-item text-primary" title="{{ $user->name  }} is available now"
          href="{{ route('profile', $user->username) }}">
                @if($user->image != "")  
                  <img class="user-avater" src="{{ asset($user->image) }}">
                @else
                  <img class="user-avater" src="{{ asset('public/defaults/user-male.png') }}"> 
                @endif  
              {{ $user->username }}
            <span class="text-success"> 
               <small><i class="fas fa-circle"></i></small>
            </span>
          </a>
        @endif
        @endforeach

    </div> 
   <br>


</div>
