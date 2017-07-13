<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Cart;
use CustomPaginator;

class OrderController extends Controller
{

	protected $orderRepo;
	protected $orderProductRepo;

	public function __construct(EntityManager $em)
	{
		$this->orderRepo = $em->getRepository('App\Entity\Commerce\Order');
		$this->orderProductRepo = $em->getRepository('App\Entity\Commerce\OrderProduct');
	}

	/**
     * Add New order and orderlines
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @return boolean
     */
    public function order()
    {

    	$cartItems = Cart::content();
    	$userInfo = session()->all();
    	$order = array(
    		'company_id' => $userInfo['company_id'],
    		'user_id' => $userInfo['user_id'],
    		'object_id' => $userInfo['object_id'],
    		);
    	$orderId = $this->orderRepo->createOrder($order);

    	if(Cart::count() > 0) {
    		foreach ($cartItems as $key => $value) {
	    		$this->orderProductRepo->createOrderLine($value, $orderId);
	    	}
    	}
    	//Transfer files for floorplanner

    	//Send Email to client

    	echo 1;

    }

    public function orderStatus($objId)
    {
    	$data = $this->orderRepo->getOrders($objId);
    
    	//data should be in array
    	$paginatedSearchResults = CustomPaginator::getPaginator($data, 10);

    	return view('pages.order.order-status')->with('orderData', array('oData' => $paginatedSearchResults, 'objId' => $objId));
    }
}
