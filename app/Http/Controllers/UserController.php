<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendActivationCode;


class UserController extends Controller
{

    protected $companyRepo;
    protected $addressRepo;
    protected $userRepo;

    public function __construct(EntityManager $em)
    {
        $this->companyRepo = new \App\Repository\CompanyRepository($em);
        $this->addressRepo = new \App\Repository\AddressRepository($em);
        $this->userRepo = new \App\Repository\UserRepository($em);
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
      
        $emailExist = $this->userRepo->checkEmail($request->all()['email']);
        if($emailExist) {
            return response()->json([
                'error' => "A user with the email ".$request->all()['email']." already exists!"
            ]);
        } 

        $companyId = $this->companyRepo->create($request->all());
        $this->addressRepo->create($request->all(), $companyId);
        $user = $this->userRepo->create($request->all(), $companyId); 
        $code = $this->userRepo->addUserActivation($user->getId());
        $data = array(
                'code' => $code,
                'url' => "http://localhost:88/cemos-portal-webshop/activate/".$code,
                'name' => $user->getFirstName(). " ".$user->getLastName()
            );
      
        Mail::to("vailoces.gladys@gmail.com")->send(new SendActivationCode($data));

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function activate($code)
    {
        $isExisted = $this->userRepo->checkIfCodeExist($code);
        if(isset($isExisted['exist'])){
            $updateEmailVerified = $this->userRepo->updateEmailVerified($isExisted['user_id']);
            return redirect()->route('login')->with('status','Your email has verified. Please log in.');
        }
    }


}
