@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

         {!! $sidebar !!}

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <span class="text-muted"><i class="fas fa-tachometer-alt"></i> Dashboard</span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>


    </div>
</div>
@endsection
