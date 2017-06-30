<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	protected $userRepo;
 

    public function __construct(EntityManager $em)
    {
        $this->userRepo =  $em->getRepository('App\Entity\Management\User');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$user = $this->userRepo->getUserArrayById(Auth::user()->getId());

      return view('pages.profile.profile')->with('userData', $user);
    }

    public function updatePic(Request $request)
    {
    	$file = $request->file('profile-pic');
    	$destinationPath = public_path().'\images';
    	
      	$file->move($destinationPath,$file->getClientOriginalName());
      	$isUploaded = $this->userRepo->updateProfilePic($request->all()['user_id'], 'images\\'.$file->getClientOriginalName());
      	if($isUploaded)
      	{
      		return redirect()->route('profile-page')->with('status', "Profile Picture successfully updated.");
      	}
      	return redirect()->route('profile-page')->with('status', "Error in uploading. Please contact your administrator.");
    	
    }
}
