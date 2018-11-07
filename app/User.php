<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function username()
    {
      return $this->username;
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
