@extends('dashboard.app')

@push('css')
<link rel="stylesheet" href="{{ asset('public/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/checkbox.css') }}">
@endpush

@section('content')

<div class="container">
<form action="{{ route('post.update', $post->id) }}" method="post">
@csrf
@method('PUT')

<div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <span class="text-muted"><i class="fas fa-edit"></i> Write article {{ $post->user->name }} </span>
                </div>
        

                <div class="card-body" style="padding:20px">
                        <div class="form-group" style="width:70%">
                            <input type="text" class="form-control"
                             name="title" value="{{ $post->title }}">
                        </div>

                        <div class="form-group">
                           
                        <span class="text-muted"><strong>Permalink -</strong> https://mcubs.com/post/
                          <input readonly class="readonly" value="{{ $post->slug }}" name="slug" id="slug">
                          <a class="btn btn-link btn-sm" id="remove_disable" href="#">EDIT</a>
                        </span>
                           

                        </div>
                
                        <textarea id="editor" name="description">{!! $post->description !!}
                        </textarea>
                        {{-- <ul>
                            @foreach ($post->tags as $item)                  
                                <li>{{ $item->name }}</li>                       
                            @endforeach
                        </ul> --}}
                </div>
            </div>
        </div>


<div class="col-md-4">

<div class="card panel-default">
        <div class="card-header">
            <span class="text-muted">
                <i class="fas fa-folder-open"></i> Categories
            </span>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs">
                <li class="nav-item active">
                <a class="nav-link active" href="#"> All categories</a>
            </li>
                <li class="nav-item">
                <a class="nav-link text-primary" href="{{ route('category.create') }}">
                Create category</a>
                </li>
            </ul>
            
            <div style="overflow-y: scroll; height:150px;   padding: 10px;">
            
                @foreach ($cats as $cat)
                    <label class="checkbox-label">
                        {{ $cat->name }} 
                        <input type="checkbox" name="category[]" value="{{ $cat->id }}"
                            @foreach ($post->categories as $item)
                                @if ($item->id == $cat->id)
                                    checked
                                @endif
                            @endforeach >
                        <span class="checkmark"></span>
                    </label>                      
                @endforeach    

        </div>
        
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
       
    <p>Select specific tags, please seprerate  each tags by (,) comma.</p>
    <select type="select" name="tag[]"
     class="form-control-sm form-control" id="multi-select"  multiple>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}" 
                @foreach ($post->tags as $item)
                    @if ($item->name == $tag->name)
                        selected
                    @endif
                @endforeach
                >{{ $tag->name }}</option>
        @endforeach
    </select> 

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

            <div class="card-body">
                <a class="btn btn-danger btn-sm" href="{{ URL::previous() }}">BACK</a>
                <button type="submit" class="btn btn-success btn-sm">SAVE THE POST</button>
            </div>  
            <br>


        </div>

    </div>

</form>    
</div>

<script>
  

$(document).ready(function(){
       $('#remove_disable').on('click', function(){
            $('#slug').removeAttr('readonly');
            $('#slug').removeClass('readonly'); 
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