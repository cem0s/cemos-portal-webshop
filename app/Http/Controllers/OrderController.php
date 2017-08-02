<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOrderDetails;
use App\Dropbox;
use Cart;
use CustomPaginator;

class OrderController extends Controller
{

	protected $orderRepo;
    protected $orderProductRepo;
	protected $creditRepo;

	public function __construct(EntityManager $em)
	{
		$this->orderRepo = $em->getRepository('App\Entity\Commerce\Order');
        $this->orderProductRepo = $em->getRepository('App\Entity\Commerce\OrderProduct');
		$this->creditRepo = $em->getRepository('App\Entity\Management\CreditPoints');
	}

	/**
     * Add New order and orderlines
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @return boolean
     */
    public function order(Request $request)
    {
        $data = $_GET;
    	$cartItems = Cart::content();
    	$userInfo = session()->all();
        $dropbox = new Dropbox;
    	$order = array(
    		'company_id' => $userInfo['company_id'],
    		'user_id' => $userInfo['user_id'],
    		'object_id' => $userInfo['object_id'],
            'payment_method' => $data['data'],
    		);

        $credit = $userInfo['credit_points'];
        
        
        $remain = $credit - Cart::total();
        
        if($remain<0){
            echo false;
        }else{
            $orderId = $this->orderRepo->createOrder($order); 

            if(Cart::count() > 0) {
                foreach ($cartItems as $key => $value) {
                    $this->orderProductRepo->createOrderLine($value, $orderId);
                }
            }

        }
    	

        //Initialize creation of order folders: product-images (for floorplans), raw, edited, delivered
        //$dropbox->createOrderFolders($userInfo, $orderId);

        //Upload Images for floorplans to dropbox
    	$this->checkFloorPlannerImages($orderId);

        $this->saveFloorPlanImages($userInfo, $orderId, 'floor plans');

    	//Send Email to client
         $data = array(
                'url' => config('app.url')."/cemos-portal/order-status/".$userInfo['object_id'],
                'cartContents' => Cart::content(),
                'subtotal' => Cart::subtotal(),
                'total' => Cart::total(),
                'tax' => Cart::tax()
            );

        //Gladys: Send activation code through email,
        Mail::to("vailoces.gladys@gmail.com")->send(new SendOrderDetails($data)); 
        
        if(count(Mail::failures()) > 0) {
            echo 0;
        }

            // deduct the credit 
            $this->creditRepo->update($remain, $userInfo['company_id']);
            $request->session()->put('credit_points',$remain); 
            //Transfer files for floorplanner

            //Send Email to client
             $data = array(
                    'url' => config('app.url')."/order-status/".$userInfo['object_id'],
                    'cartContents' => Cart::content(),
                    'subtotal' => Cart::subtotal(),
                    'total' => Cart::total(),
                    'tax' => Cart::tax()
                );

            //Gladys: Send activation code through email,
            Mail::to("vailoces.gladys@gmail.com")->send(new SendOrderDetails($data)); 


            echo 1;
        

    }

    public function orderStatus($objId)
    {
    	$data = $this->orderRepo->getOrders($objId);
    	//data should be in array
    	$paginatedSearchResults = CustomPaginator::getPaginator($data['orderData'], 10);
    	
    	return view('pages.order.order-status')->with('orderData', array('oData' => $paginatedSearchResults, 'objData' => $data['objData']));
    }

    private function checkFloorPlannerImages($orderId)
    {
        $cartItems = Cart::content();
        $tmpDir = public_path().'/tmp/';
        $userInfo = session()->all();
        $drop = new Dropbox;
        $withPlans = false;
        if(Cart::count() > 0) {
            foreach ($cartItems as $key => $value) {
                if(strtolower($value->name) == "floor planner"){
                   $withPlans = true;
                   $data = $value->options->all();
                   if(!empty($data['floors'])) {
                        $countFloors = count($data['floors']);
                        $tempCount = 1;
                        foreach ($data['floors'] as $key2 => $value2) {
                            if($tempCount <= $countFloors) {
                               $drop->uploadFile($tmpDir.$value2['file_name_'.$tempCount], "product-images", $userInfo, $orderId, $value->name);
                                $tempCount++;
                            }
                        }
                    }
                }
            }
        }
        return $withPlans;
    }

    public function saveFloorPlanImages($user, $orderId, $folder)
    {
        $destination = public_path('images/').$user['company_id'].'/'.$user['object_id'].'/'.$orderId.'/'.$folder;
        $tmpDir = public_path().'/tmp/';

        if(!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        if(Cart::count() > 0) {
            foreach (Cart::content() as $key => $value) {
                if(strtolower($value->name) == "floor planner"){
                   $data = $value->options->all();
                   if(!empty($data['floors'])) {
                        $countFloors = count($data['floors']);
                        $tempCount = 1;
                        foreach ($data['floors'] as $key2 => $value2) {
                            if($tempCount <= $countFloors) {
                               copy($tmpDir.$value2['file_name_'.$tempCount], $destination.'/'.$value2['file_name_'.$tempCount]);            
                               unlink($tmpDir.$value2['file_name_'.$tempCount]);
                               unlink($tmpDir.'thumbnail/'.$value2['file_name_'.$tempCount]);
                               $tempCount++;
                            }
                        }
                    }
                }
            }
        }

    }

    public function deleteOrderProduct(Request $request)
    {
        $id = $request->all()['id'];

        echo $this->orderProductRepo->deleteOrderProduct($id);
    }
}
