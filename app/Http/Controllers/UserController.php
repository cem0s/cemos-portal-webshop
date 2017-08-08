<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendActivationCode;


class UserController extends Controller
{

    protected $userRepo;
 

    public function __construct(EntityManager $em)
    {
        $this->middleware('auth', ['only' => ['show', 'update']]);
        $this->userRepo =  $em->getRepository('App\Entity\Management\User');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Gladys: Creates the user
        $userData = $this->userRepo->create($request->all());
        
        //Gladys: If user existed
        if($userData['exist']) {
            return response()->json([
                'error' => "A user with the email ".$request->all()['email']." already exists!"
            ]);
        } 
        
        $data = array(
                'url' => config('app.url')."/cemos-portal/activate/".$userData['code'],
                'name' => $userData['user']['firstname']. " ".$userData['user']['lastname']
            );

        //Gladys: Send activation code through email,
        //Mail::to("vailoces.gladys@gmail.com")->send(new SendActivationCode($data)); 
     
        return response()->json($userData['userObj'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userData = $this->userRepo->getAllUserInfo($id);

        return response()->json($userData, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userData = $this->userRepo->updateUser($request->all());
        if(empty($userData)) {
            return response()->json([
                'error' => "Oops. Error in updating your profile. Kindly check your data."
            ]);
        }
        return response()->json($userData, 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * This activates the user account 
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $code activation code
     * @return Response
     */
    public function activate($code)
    {
        //Check if code exists
        $isExisted = $this->userRepo->checkIfCodeExist($code);
        if(isset($isExisted['exist'])){
            //Updates the user account to active and verified
            $updateEmailVerified = $this->userRepo->updateEmailVerified($isExisted['user_id']);
            return redirect()->route('login')->with('status','Your email has verified. Please log in.');
        }
    }


}
