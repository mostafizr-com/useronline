@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {!! $sidebar !!}

        <div class="col-md-9">

            <div class="card">
                <div class="card-header">New Category</div>

                <div class="card-body" style="padding:20px">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Category name">
                        </div>

                        {{-- <input type="hidden" name="slug" id="cat-slug"> --}}

                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Category Description">
                            </textarea> 
                        </div>

                        <a class="btn btn-danger" href="{{ route('category.index') }}">CANCEL</a>
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection