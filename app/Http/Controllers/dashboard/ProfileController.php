<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Redirect;
use Auth;
use App\Post;

class ProfileController extends Controller
{
    
    function index($username)
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        $data['user'] = User::where('username', $username)->first();

        return view('dashboard/pages/profile/index', $data);
    }

    function all_users()
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        $data['users'] = User::orderBy('name','ASC')->get();
        return view('dashboard/pages/profile/alluser', $data);
    }

    function edit($user)
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        $data['user'] = User::where('username', $user)->first();

        return view('dashboard/pages/profile/edit', $data);        
    }

    function articles()
    {
        $data['sidebar'] = $this->dashboard_sidebar();
        $data['posts'] = Post::where('author_id', Auth::user()->id)->latest()->get();
        return view('dashboard/pages/profile/myarticles', $data);
    }

    function update(Request $rq, $user)
    {
        // echo "<pre>";
        // print_r($rq->all()); die;

        $file = $rq->file('image');

        // echo $file; die;
        $old_img = User::where('username', $user)->first();


        if($file)
        {
            $ext = strtolower($file->getClientOriginalExtension());
            $new_name = str_random(10).'-'.uniqid(10).'-'.Carbon::now()->toDateString();
            $new_file = strtolower($new_name).'.'.$ext;
            $upload_path = 'public/assets/user-image/';
            $image_url = $upload_path.$new_file; 
            
            //check if there is any image exist
            if($old_img->image != "")
            {
               if(is_file($old_img->image))
               {
                 unlink($old_img->image);
               } 
                
            }

            //move the selected image to specific directory
            $file->move($upload_path, $new_file);

        }
        else
        {
            $image_url = $old_img->image;  
        }


        $data = User::whereUsername($user)->first();

        $data->name = $rq->name;
        $data->image = $image_url;
        $data->email = $rq->email;
        $data->mobile = $rq->mobile;
        $data->facebook = $rq->facebook;
        $data->twitter = $rq->twitter;
        $data->google = $rq->google;
        $data->github = $rq->github;
        $data->userbrief = $rq->userbrief;

        $data->save();

        return Redirect::route('profile.edit', $user);
        
    }
}
