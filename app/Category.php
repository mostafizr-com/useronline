<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'description'];

    function posts()
    {
        return $this->belongsToMany('App/Post');
    }

}
