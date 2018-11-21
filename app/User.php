<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;
use App\Post;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 
        'username', 
        'image',
        'email', 
        'mobile', 
        'facebook', 
        'twitter', 
        'google', 
        'github', 
        'userbrief',
        'password',
        'auth_method'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    function posts()
    {
        return $this->hasMany('App\Post');
    }

    function username()
    {
      return $this->username;
    }

    function user_role()
    {
        if($this->user_role == 3)
        {
           return "Subscriber"; 
        }
        elseif($this->user_role == 2)
        {
           return "Author";
        }
        elseif($this->user_role == 1)
        {
            return "Moderator";
        }
        elseif($this->user_role == 0)
        {
            return "Admin";
        }
    }

    function is_online()
    {
       return Cache::has('user-is-online'.$this->id);
    }

    function user_social()
    {     
    ?>
    <ul class="user-social">
        <li class="list-item"><a href='https://facebook.com/<?= $this->facebook ?>'>Facebook</a></li>
        <li class="list-item"><a href='https://twitter.com/<?= $this->twitter ?>'>Twitter</a></li>
    </ul>
    <?php

    }






}
