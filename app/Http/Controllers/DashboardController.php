<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;

class DashboardController extends Controller
{


    protected $em;
 

    public function __construct(EntityManager $em)
    {
        $this->em =  $em;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data = array();
        $objectRepo = $this->em->getRepository('App\Entity\Realestate\Object');
        $orderRepo = $this->em->getRepository('App\Entity\Commerce\Order');
        $orderPRepo = $this->em->getRepository('App\Entity\Commerce\OrderProduct');

    	$data['property'] = $objectRepo->getAllObjects();
        $data['orders'] = $orderRepo->getAllOrders();
        $deliverdCount = 0;

        if(!empty($data['orders'])) {
            foreach ($data['orders'] as $key => $value) {
                if($value['status'] == "Delivered"){
                   $deliverdCount++;
                }
            }
        }

    	$data['deliverdCount'] = $deliverdCount;

        return view('pages.dashboard.dashboard')->with('data', $data);
    }
}
