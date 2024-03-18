<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ],[
            'first_name.required' => 'Please enter your first name',
            'last_name.required' => 'Please enter your last name',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email',
            'email.max' => 'Maximum size allowed for email is 225 character',
            'email.unique' => 'This email is already taken',
            'password.required' => 'Please enter your password',
            'password.min' => 'You must enter at least 8 characters'
        ]);
    }

    public function showRegistrationForm()
    {
        return view('site.auth.register');
    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails())  {
            return response()->json(['status' => 'error', 'data' => $validation->errors()->first()], 500);
        }
        else{
            $user = $this->create($request->all());
            if ($user){
                Auth::login($user , $request->has('remember'));
                $request->session()->regenerate();
                return response(['success' => true], Response::HTTP_OK);
            }

            return
                response([
                    'success' => false,
                    'data' => 'Error , please try again'
                ], Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $name = $data['first_name'].' '.$data['last_name'];
        return User::create([
            'first_name' => $data['first_name'],
            'slug' => User::where('slug' , Str::slug($name , '-'))->first() ? Str::slug($name, '-').'-'.rand(0 , 9)  : Str::slug($name, '-'),
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function redirectPath()
    {
        return $this->redirect('/profile');
    }
}
