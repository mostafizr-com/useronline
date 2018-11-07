@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {!! $sidebar !!}

        <div class="col-md-9">

            <div class="card">
                <div class="card-header">New tag</div>

                <div class="card-body" style="padding:20px">
                    <form action="{{ route('tag.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="tag name">
                        </div>

                        <a class="btn btn-danger" href="{{ route('tag.index') }}">CANCEL</a>
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection