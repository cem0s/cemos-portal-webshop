<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Doctrine\ORM\EntityManager;


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

    /**
     * This overrides the rest function from ResetsPasswords class. 
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $request userdata
     * @return Response
     */
    public function reset(Request $request)
    {
        $userRepo = $this->em->getRepository('App\Entity\Management\User');

        //Check if email exists in the user table
        $isEmailExist = $userRepo->checkEmail($request->all()['uemail']);

        if($isEmailExist['exist']) {
            //Update password
            $user = $userRepo->updatePassword($request->all());

            //Automatically log in user
            Auth::login($user);
            return redirect()->route('dashboard');
        } 

        return redirect()->route('password.reset',  $request->all()['token'])->with('status', 'Sorry, you entered a different email. Please try again.');
        
    }
}
