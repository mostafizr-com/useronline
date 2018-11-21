@extends('dashboard.app')

@push('css')
<link rel="stylesheet" href="{{ asset('public/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/checkbox.css') }}">
@endpush

@section('content')

<div class="container">

<div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h3 class="text-muted"> {{ $post->title }} </h3>
                </div>
                

                <div class="card-body" style="padding:20px">
                    <span>Posted by: 
                        <a href="{{ route('profile', $post->user->username) }}">
                            {{ $post->user->name }}
                        </a>
                    </span>   
                    <br><br>
                    {!! $post->description !!}
                    
                    <ul>
                        @foreach ($post->tags as $item)                  
                            <li class="badge badge-dark">{{ $item->name }}</li>                       
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


<div class="col-md-4">
<div class="card panel-default">
        <div class="card-header">
            <span class="text-muted">
                <i class="fas fa-folder-open"></i> Options
            </span>
        </div>
        <div class="card-body">
            <p><strong class="text-muted">Url: </strong>
                <a href="https://mcubs.com/post/{{ $post->slug }}">
                   https://mcubs.com/post/{{ $post->slug }}
                </a>
            </p>               
        </div> 
        <div class="card-header">
            <a class="btn btn-danger btn-sm" href="{{ URL::previous() }}">BACK</a>
            <a class="btn btn-success btn-sm" href="{{ route('post.edit', $post->id) }}">EDIT</a>
        </div> 
</div>
<br>

<div class="card panel-default">
        <div class="card-header">
            <span class="text-muted">
                <i class="fas fa-folder-open"></i> Categories
            </span>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($post->categories as $item)
                 <li class="badge badge-warning">{{ $item->name }}</li>
                @endforeach
            </ul>               
    </div>  
</div>
<br>

<div class="card">
    <h6 class="card-header">
        <span class="text-muted">
            <i class="fas fa-tag"></i> Tags
        </span>
    </h6>
   <div class="card-body">
    <ul>
        @foreach ($post->tags as $item)
          <li class="badge badge-success">{{ $item->name }}</li> 
        @endforeach
    </ul>
   </div>
</div>
 
<br>


<div class="card">
        <h6 class="card-header">
            <span class="text-muted"><i class="fas fa-image"></i> Featured image</span>
        </h6>
        <div class="card-body">
            
            <a href="#">Select a Image</a>

        </div>
    </div>

<br>


</div>

</div>
  
</div>

<script>
  

$(document).ready(function(){
       $('#remove_disable').on('click', function(){
            $('#slug').removeAttr('disabled');
            $('#slug').removeClass('disabled'); 
            $('#remove_disable').hide();
       });
});

</script>
@endsection
@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
        $('#multi-select').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
</script>

@endpush