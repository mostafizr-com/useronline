@extends('dashboard.app')

@section('content')
<div class="container">
<form action="{{ route('post.store') }}" method="post">
@csrf

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                    <div class="card-header">
                        <span class="text-muted"><i class="fas fa-edit"></i> Write article</span>
                    </div>
        

                <div class="card-body" style="padding:20px">
                        <div class="form-group">
                            <input type="text"  v-model="title"  class="form-control"
                             name="title" placeholder="Post title">
                        </div>

                        <div class="form-group">
                           
                        <span class="text-muted"><strong>post url -</strong> https://mcubs.com/post/
                          <input disabled class="disabled" type="text" :value="title | permalink" name="slug" id="slug">
                          <a class="btn btn-link btn-sm" id="remove_disable" href="#">EDIT</a>
                        </span>
                           

                        </div>
                
                        <textarea id="editor" name="description">
                        </textarea>
                   
                   
                </div>
            </div>
        </div>


        <div class="col-md-4">

           <div class="card">
                <h6 class="card-header">
                    <span class="text-muted"><i class="fas fa-folder-open"></i> Categories</span>
                </h6>
               <div class="card-body">
                   
                <select type="select" class="form-control form-control-sm">
                    <option value="">Select a category</option>
                    <option value="">Wordpress</option>
                    <option value="">Codeigniter</option>
                    <option value="">Laravel</option>
                    <option value="">Bootstrap</option>
                </select>    

               </div>
           </div>
<br>

           <div class="card">
                <h6 class="card-header">
                    <span class="text-muted"><i class="fas fa-tags"></i> Tags</span>
                </h6>
                <div class="card-body">
                    
                 <select type="select" class="form-control form-control-sm">
                     <option value="">Select a tag</option>
                     <option value="">Wordpress</option>
                     <option value="">Codeigniter</option>
                     <option value="">Laravel</option>
                     <option value="">Bootstrap</option>
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
                <a class="btn btn-danger btn-sm" href="{{ route('post.index') }}">CANCEL</a>
                <button type="submit" class="btn btn-success btn-sm">SAVE THE POST</button>
            </div>  
            <br>


        </div>

    </div>

</form>    
</div>

<script>
  
var container = new Vue({

     el: '#app',
     data:{
            title:"",
            edit:true,
        },
        filters:{
            permalink: function(e){
                        var str = e.trim();
                        str = str.toLowerCase();
                        permalink = str.replace(/[\s?.,='"^#*@$%><!]/g, '-'); 
                        permalink = permalink.replace(/-+/g,'-');     
                        permalink = permalink.substring(0, 25);
                        permalink = permalink.trim();
                        return permalink;
           
                   }
        }
});

$(document).ready(function(){
       $('#remove_disable').on('click', function(){
            $('#slug').removeAttr('disabled');
            $('#slug').removeClass('disabled'); 
            $('#remove_disable').hide();
       });
});

</script>
@endsection