<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Tag;
use App\User;

class Post extends Model
{
    protected $table = "posts";

    function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    } 


}
