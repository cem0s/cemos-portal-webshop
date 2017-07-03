<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendResetMail;
use Illuminate\Support\Facades\Mail;



class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected $em;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->middleware('guest');
    }

    /**
     * This overrides the sendResetLinkEmail function from SendsPasswordResetEmails class. 
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $request userdata
     * @return Response
     */
    public function sendResetLinkEmail(Request $request)
    {
        $userRepo = $this->em->getRepository('App\Entity\Management\User');

        //Before sending the reset link, check if the email provided exists in the user table
        $getEmail = $userRepo->checkEmail($request->all()['email']);

        if($getEmail['exist']) {
            $data = array(
                'url' => config('app.url')."/cemos-portal/password/reset/".$getEmail['code'],
                'name' => $getEmail['user']->getFirstName(). " ".$getEmail['user']->getLastName()
            );
            //Send the email for reset
            Mail::to("vailoces.gladys@gmail.com")->send(new SendResetMail($data));

            return redirect()->route('password.request')->with('status', 'Email sent to '.$request->all()['email'].' for password reset. Please check your email.');
        }
        return redirect()->route('password.request')->with('status', 'Email address provided doesn\'t exist.');
    }
}
