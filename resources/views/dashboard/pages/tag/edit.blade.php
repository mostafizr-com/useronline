@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {!! $sidebar !!}

        <div class="col-md-9">

            <form id="delete-cat" action="{{ route('tag.destroy', $tag->id) }}"
                method="POST" style="display: none;" >
                @csrf
                @method('DELETE')
            </form>
        
            <button class="btn btn-link text-danger"
                onclick="event.preventDefault(); document.getElementById('delete-cat').submit();">
                DELETE!
            </button>

            <a class="btn btn-primary btn-sm" href="{{ route('tag.create') }}">
            ADD NEW TAG
            </a>



            <div class="card">
                <div class="card-header">Update Tag</div>

                <div class="card-body" style="padding:20px">
                    <form action="{{ route('tag.update',$tag->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ $tag->name }}">
                        </div>

                        <a class="btn btn-danger" href="{{ route('tag.index') }}">CANCEL</a>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection