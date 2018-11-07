@extends('dashboard.app')

@section('content')
<form class="form" action="{{ route('profile.update', $user->username) }}" method="post" id="registrationForm" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')

<div class="container">
 
    <div class="row justify-content-center">

         {!! $sidebar !!}

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <span class="text-muted"><i class="fas fa-user-tie"></i> 
                      Edit {{ Auth::user()->username }}'s Profile 
                    </span>

                    <div class="float-right">
                        <button class="btn btn-sm btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                        <a class="btn btn-sm btn-danger" href="{{ route('profile', Auth::user()->username) }}" ><i class="glyphicon glyphicon-repeat"></i> Back</a>
                    </div>   

                </div>

                <div class="card-body">

                        <br>

                    <div class="row">
                        <div class="col-sm-5 text-center"><!--left col-->
                        
                        <label for="file">    
                            <div class="card-body"> 
                                    @if($user->image != "")  
                                    <img class="img-thumbnail avatar" style="width:80%" 
                                    src="{{ asset($user->image) }}">
                                @else
                                    <img class="img-thumbnail" style="width:80%; overflow:hidden"
                                    src="{{ asset('public/defaults/user-male.png') }}"> 
                                @endif
                            </div>
                       </label>
    
                        <div class="card-body">
                                <div class="text-center">

                                    <div style="overflow:hidden;  padding:10px;">
                                        <input class="btn btn-default form-control file-upload" 
                                        type="file" name="image" id="file" title="Choose a image to upload">
                                    </div>  
                                </div>
                            </div>    
                       
                         <br>

                 
                    <div class="card">    
                    <div class="card-header">Social links</div>        
                    <div class="card-body">
                        <div class="form-group">
                                <div class="col-xs-6">
                                <input type="text" class="form-control" name="facebook"
                                 value="{{ $user->facebook }}" placeholder="www.facebook.com/username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" class="form-control" name="twitter" 
                                value="{{ $user->twitter }}" placeholder="www.twitter.com/username">
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-xs-6">
                                <input type="text" class="form-control" name="google" 
                                value="{{ $user->google }}" placeholder="plus.google.com/username">
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="col-xs-6">
                                <input type="text" class="form-control" name="github" 
                                value="{{ $user->github }}" placeholder="www.github.com/username">
                            </div>
                        </div>     
                    </div>        
                  </div>  
                            
                </div><!--/col-3-->



                <div class="col-sm-7">
 
                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" class="form-control" disabled 
                                value="{{ $user->username }}"  title="Username cannot be changed">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" class="form-control" name="name" 
                                value="{{ $user->name }}">
                            </div>
                        </div>
            
                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="text" class="form-control" name="email" 
                                 value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <input type="number" class="form-control" name="mobile" 
                                value="{{ $user->mobile }}" placeholder="Mobile no">
                            </div>
                        </div>


                        <div class="form-group">
                                <div class="col-xs-6">
                                <textarea type="text" class="form-control" rows="5"
                                 name="userbrief" placeholder="Something about you">{{ $user->userbrief }}</textarea>
                            </div>
                        </div>
                         
                </div><!--/col-9-->
            </div><!--/row-->
          
           
        </div>


       <div class="card-footer">
            <div class="float-right">
                <button class="btn btn-sm btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                <a class="btn btn-sm btn-danger" href="{{ route('profile', Auth::user()->username) }}" ><i class="glyphicon glyphicon-repeat"></i> Back</a>
            </div>   
       </div>


     </div>
</div>


</div>
</div>

</form> 

<script>
        $(document).ready(function() {
        
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
        
                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }
        
                    reader.readAsDataURL(input.files[0]);
                }
            }
        
            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
</script>

@endsection
