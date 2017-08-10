<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use App\Common;

class DashboardController extends Controller
{


    protected $em;
    protected $common;
 

    public function __construct(EntityManager $em)
    {
        $this->em =  $em;
        $this->common = new Common();

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

        if($this->common->checkIfAdmin()) {
            $data['property'] = $objectRepo->getAllObjects();
            $data['orders'] = $orderRepo->getAllOrders();
        } else if($this->common->checkIfRealtorAdmin()) {
            $data['property'] = $objectRepo->getObjectsByCompanyId(session('company_id'));
            $data['orders'] = $orderRepo->getOrdersByCompanyId(session('company_id'));
        }

        $data['property'] = $objectRepo->getObjectsByUserId(session('user_id'));
        $data['orders'] = $orderRepo->getOrdersByUserId(session('user_id'));

    
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
