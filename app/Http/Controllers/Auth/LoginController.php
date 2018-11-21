<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Socialite;
use App\User;
use Auth;
use Redirect;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instan5182771ce.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    function socialLoginRedirect($method)
    {

        switch ($method) {
            case 'facebook':
                $driver = 'facebook';
                break;
            case 'twitter':
                $driver = 'twitter';
                break;
            case 'google':
                $driver = 'google';
                break;
            case 'github':
                $driver = 'github';
                break;
            default:
                $driver = 'default';
                break;

            // return $driver;    
        }

        return Socialite::driver($driver)->redirect();
    }



    function providerCallback()
    {

        $driver = request()->segment(2);

        // dd($driver);

        $user = Socialite::driver($driver)->user();

        // dd($user);

        $exp = explode('@', $user->email);
        $username = str_replace(['.','_',' '],'-',$exp[0]);
        // dd($user);

        $checkUser = User::where('email', $user->email)->first();

        if($checkUser && 
            $checkUser->auth_method == $driver || 
            $checkUser->auth_method == 'default')
        {
          if(Auth::loginUsingId($checkUser->id))
          {
             return Redirect::route('dashboard');
          }
        }

        elseif($checkUser && $checkUser->auth_method != $driver)
        {
           
            $data['name'] = $user->name;
            $data['username'] = $username;
            $data['email'] = $user->email;
            $data['image'] = $user->avatar;
            $data['auth_method'] = $driver;

            $data['method'] = $checkUser->auth_method;

            return view('auth.allready_have', $data);
               
        }

        else
        {
           $data['name'] = $user->name;
           $data['username'] = $username;
           $data['email'] = $user->email;
           $data['image'] = $user->avatar;
           $data['auth_method'] = $driver;
           return view('auth.social_login', $data);
        }
    }


    function socialUpdateInfo(Request $rq)
    {
        //   dd($rq::all());
        $user = User::where('email', $rq->email)->first();
    
        $update = User::where('email', $rq->email)->update([
                                'name' => $rq->name,
                                'username' => $rq->username,
                                'email' => $rq->email,
                                'image' => $rq->image,
                                'password' => Hash::make($rq->password),
                                'auth_method' => $rq->auth_method,
                            ]);
        if($update)
        {
            if(Auth::loginUsingId($user->id))
            {
               return Redirect::route('dashboard');
            }
        }
    }


}
