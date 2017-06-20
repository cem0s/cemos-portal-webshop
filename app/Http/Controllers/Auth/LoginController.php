<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;



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
    protected $userRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityManager $em)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepo = new \App\Repository\UserRepository($em);
    }

    public function login(Request $request)
    {
       
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $checkIfExists = $this->userRepo->checkCredentials($credentials);

        if ($checkIfExists['exist'] == "yes")
        { //this if validate if the user is on the database line 1
            $request->session()->put('email',$credentials['password']); 
            $request->session()->put('user_id',$checkIfExists['user_id']); 
            Auth::login($this->userRepo->getUserById($checkIfExists['user_id']));
            return redirect()->route('dashboard');
            //this redirect if user is the db line 2
        } else if($checkIfExists['exist'] == "no") {
            return redirect()->route('login')->with('status','Sorry, no account existed with credentials provided.');
        } else {
            return redirect()->route('login')->with('status','Sorry, your email needs to be verified. Please check your email for verification');
        }

        return redirect($this->loginPath())
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'email' => $this->getFailedLoginMessage(),
                    ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('username', 'password');
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'These credentials do not match our records.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
    }

    public function logout(Request $request)
    {
        $request->session()->forget('email');
        $request->session()->flush(); 
        Auth::logout();
        return redirect()->route('login')->with('status','You have been logged out.');
    }

}
