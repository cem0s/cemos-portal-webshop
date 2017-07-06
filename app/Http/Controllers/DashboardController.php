<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;

class DashboardController extends Controller
{

	protected $objectRepo;
 

    public function __construct(EntityManager $em)
    {
        $this->objectRepo =  $em->getRepository('App\Entity\Realestate\Object');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data = array();

    	$data['property'] = $this->objectRepo->getAllObjects();
    	
        return view('pages.dashboard.dashboard')->with('data', $data);
    }
}
