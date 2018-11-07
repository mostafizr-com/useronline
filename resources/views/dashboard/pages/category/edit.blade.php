@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {!! $sidebar !!}

        <div class="col-md-9">

            <form id="delete-cat" action="{{ route('category.destroy', $category->id) }}"
                method="POST" style="display: none;" >
                @csrf
                @method('DELETE')
            </form>

            <button class="btn btn-link text-danger"
                onclick="event.preventDefault(); document.getElementById('delete-cat').submit();">
                DELETE!
            </button>

            <a class="btn btn-primary btn-sm" href="{{ route('category.create') }}">
                ADD NEW
            </a>
                
            <br><br>

            <div class="card">
                <div class="card-header">Update Category</div>

                <div class="card-body" style="padding:20px">
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                        </div>

                        {{-- <input type="hidden" name="slug" id="cat-slug"> --}}

                        <div class="form-group">
                            <textarea class="form-control" name="description"
                             placeholder="Category Description">{!! $category->description !!}
                            </textarea> 
                        </div>

                        <a class="btn btn-danger" href="{{ route('category.index') }}">CANCEL</a>
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection