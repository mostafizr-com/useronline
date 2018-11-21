@extends('dashboard.app')
@push('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">

        {!! $sidebar !!}

        <div class="col-md-9">

            <a class="btn btn-primary btn-sm" href="{{ route('post.create') }}">
                CREATE NEW POST
            </a>
            
            <br><br>

       
                    <div class="card-header">
                        <span class="text-muted"><i class="fas fa-file-alt"></i> All Article</span>
                    </div>

                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-sm table-bordered" id="myTable" 
                            data-order='[[ 1, "asc" ]]' data-page-length='25'>
                                    <thead class="text-center text-muted">
                                      <tr>
                                        <th scope="col">Sr</th>
                                        <th scope="col">Title</th>
                                        <th scope="col"><i class="fas fa-user"></i></th>
                                        <th scope="col"><i class="fas fa-folder"></i> Categories</th>
                                        <th scope="col"><i class="fas fa-tag"></i> Tags</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($posts as $key => $item)
                                         <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>
                                                <a href="{{ route('post.show', $item->id) }}">
                                                    <strong>{{ $item->title }}</strong>
                                                </a>
                                            </td>
                                            <td><a class="badge badge-primary" 
                                                href="{{ route('profile', $item->user->username) }}">
                                                {{ $item->user->name }}</a></td>
                                            <td>
                                            <ul>
                                                @foreach ($item->categories as $cat)
                                                    <li class="badge badge-dark">
                                                        {{ $cat->name }}</li>
                                                @endforeach
                                            </ul> 
                                            </td>    
                                                
                                            <td>
                                            <ul>
                                                @foreach ($item->tags as $tag)
                                                    <li class="badge badge-info">
                                                        {{ $tag->name }}</li>
                                                @endforeach
                                            </ul> 
                                            </td>
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
@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                paging: true,
                // scrollY: 400,
                ordering:  false,
                select: true
            });
        });       
    </script>
@endpush