<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    protected $em;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityManager $em)
    {
        $this->middleware('guest');
        $this->em = $em;
    }

    public function reset(Request $request)
    {
        $userRepo = new \App\Repository\UserRepository($this->em);
        $isEmailExist = $userRepo->checkEmail($request->all()['uemail']);

        if($isEmailExist['exist']) {
            $user = $userRepo->updatePassword($request->all());
            Auth::login($user);
            return redirect()->route('dashboard');
        } 

        return redirect()->route('password.reset',  $request->all()['token'])->with('status', 'Sorry, you entered a different email. Please try again.');
        
    }
}
