<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
       
        $this->middleware('guest:admin')->except('getLogout');
    }


    public function showAdminLoginForm()
    {

        //dd('here');
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {

       
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            //return redirect()->intended('/admin');

            return response()->view('admin.home');

            //return redirect()->route('admin.home');
        }

      
        return back()->withInput($request->only('email', 'remember'));
    }

    public function adminHomePage()
    {
       // dd('here');
        return view('admin.home');
    }

    public function getLogout(){

      //  dd('here');
        Auth::guard('admin')->logout();
        return redirect()->route('home');
    }



}
