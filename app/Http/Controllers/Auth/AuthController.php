<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Auth;
use Closure;
use Socialite;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function redirectToProvider()
    {
        return Socialite::driver('google')->with(['hd' => 'nyu.edu'])->redirect();
    }
    
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        
        //return response()->json($authUser);
        return redirect('/admin');
    }
    
    private function findOrCreateUser($user)
    {
        if ($authUser = User::where('id', $user->id)->first()) {
            $authUser->token = $user->token;
            $authUser->save();
            
            return $authUser;
        }
        
        return User::create([
            'token' => $user->token,
            'id' => $user->id,
            'nickname' => $user->nickname,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'user' => $user->user,
        ]);
    }
    
    public function logout()
    {
        Auth::logout();
        
        return redirect('/');
    }
    
    public function login()
    {
        return view('admin.login');
    }
}
