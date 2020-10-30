<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $userData = array(
    //         'email' => Input::get('email'),
    //         'password' => Input::get('password'),
    //     );
    //     var_dump(Auth::attempt($userData));
    //     die;
    //     if (Auth::attempt($userData)) {
    //         var_dump("test");
    //         die;
    //         if (Auth::user()->role == 'user') {
    //             var_dump("test2");
    //             die;
    //             return redirect('student');
    //         } elseif (Auth::user()->role == 'admin') {
    //             return redirect('admin');
    //         }
    //     }
    //     return redirect('login')->with('message', 'Account not found');
    // }
}
