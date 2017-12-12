<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

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

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function index() {
	    //Show the login form
    }

    public function getSignUp() {
        //Show sign up form
        return view('auth.register');
    }

	public function authenticate() {
	    //Check the user credentials for login with Sentinel (email, password)
        $credentials = Input::all();
        if(Sentinel::authenticate($credentials)) {

        }
    }

    public function register(Request $request) {
        //Register the user with the credentials provided
        $avatar = $request->all();
        $validator = Validator::make($avatar, array(
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ));
        if($validator->fails()) {
            return Redirect::back()->withInput($request->except('password'))->withErrors($validator->errors());
        } else {
            $user = \Sentinel::register([
                'first_name' => $avatar['first_name'],
                'last_name' => $avatar['last_name'],
                'email' => $avatar['email'],
                'password' => $avatar['password']
            ]);

            $role = \Sentinel::findRoleByName('Professionals');

            $role->users()->attach($user);

            \Sentinel::login($user);

            return Redirect::route('home');
        }
    }

}
