<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    protected $table = 'tags';

    function post()
    {
        return $this->belongsToMany('App\Post');
    }
} 
