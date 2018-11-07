@extends('dashboard.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        {!! $sidebar !!}

        <div class="col-md-9">

            <a class="btn btn-primary btn-sm" href="{{ route('post.create') }}">
                CREATE NEW POST
            </a>
            
            <br><br>

            <div class="card">
                    <div class="card-header">
                        <span class="text-muted"><i class="fas fa-file-alt"></i> All Article</span>
                    </div>

                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-sm">
                                    <thead>
                                      <tr>
                                        <th scope="col">Sr</th>
                                        <th scope="col">name</th>
                                        <th scope="col">slug</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($posts as $key => $item)
                                         <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>
                                                <a href="{{ route('post.edit', $item->id) }}">
                                                    EDIT
                                                </a>
                                            </td>
                                          </tr> 
                                       @endforeach 

                                    </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection