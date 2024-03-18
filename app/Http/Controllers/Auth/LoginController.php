<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('site.auth.login');
    }

    protected function username()
    {
        return 'email';
    }


    public function login(Request $request)
    {
        $v = validator($request->all(), [
            $this->username() => 'required|email',
            'password' => 'required|min:8',
        ], [
            $this->username() . '.required' => 'Email is required',
            $this->username() . '.email' => 'Please enter a correct email ',
            'password.required' => 'Password is required',
            'password.min' => 'Minimum characters for your password is 8 ',
        ]);

        if ($v->fails()) {
            return \response()->json(['status' => 'error', 'data' => $v->errors()->first()], 500);
        }

        $credentials = $request->only($this->username(), 'password');
        $authSuccess = Auth::attempt($credentials, $request->has('remember'));

        if ($authSuccess) {
            $request->session()->regenerate();
            return response(['success' => true], Response::HTTP_OK);
        }

        return
            response([
                'success' => false,
                'data' => 'Your email or password is incorrect , please try again'
            ], Response::HTTP_FORBIDDEN);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        if ($provider == 'twitter'){
            $userSocial = Socialite::driver($provider)->user();
        }else{
            $userSocial = Socialite::driver($provider)->stateless()->user();
        }
        $users = User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            Auth::login($users);
            return redirect()->intended('/profile');
        } else {
            $names = explode(" ",$userSocial->getName());

            $user = User::create([
                'first_name' => $names[0],
                'last_name' => end($names),
                'slug' => User::where('slug' , Str::slug($userSocial->getName() , '-'))->first() ? Str::slug($userSocial->getName(), '-').'-'.rand(0 , 9)  : Str::slug($userSocial->getName(), '-'),
                'email' => $userSocial->getEmail(),
                'image' => $userSocial->getAvatar(),
                'password' => bcrypt($provider),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
            ]);
            Auth::login($user);
            return redirect()->intended('/profile');
        }
    }
}
