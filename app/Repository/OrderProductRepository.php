<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Facades\Hash;


class OrderProductRepository extends EntityRepository
{

	/**
     * Create new data for order line
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @return boolean
     */
	public function createOrderLine($data, $orderId)
	{
		$oData = get_object_vars($data);

		$dataArray = array();
		if(isset($oData['options'])) {
			foreach ($oData['options'] as $key => $value) {
				$dataArray[$key] = $value;
			}
		}
	
	
		try {
			
			$orderLine = new \App\Entity\Commerce\OrderProduct();
			$orderLine->setQuantity($oData['qty']);
			$orderLine->setPrice($oData['price']);
			$orderLine->setData(serialize($dataArray));
			$orderLine->setStep(1);
			$orderLine->setOrderId($orderId);
			$orderLine->setSupplierId(0);
			$orderLine->setSupplierUserId(0);
			$orderLine->setProductId($oData['id']);
			$orderLine->setOrderProductStatusId(2);
			$this->_em->persist($orderLine);
			$this->_em->flush();

			return 1;

		} catch (Exception $e) {

			return 0;
		}

	}

	public function getOrderProductByOrderId($orderId)
	{
		$result = array();
		$repo = $this->_em->getRepository(\App\Entity\Commerce\OrderProduct::class);
		$stepRepo = $this->_em->getRepository(\App\Entity\Commerce\OrderProductStep::class);
		$productRepo = $this->_em->getRepository(\App\Entity\Commerce\Product::class);
		$statusRepo = $this->_em->getRepository(\App\Entity\Commerce\Status::class);
		$compRepo = $this->_em->getRepository(\App\Entity\Management\Company::class);
		$search = $repo->findBy(array('orderId'=> $orderId));
		if(!empty($search)) {
			foreach ($search as $key => $value) {
				$result[] = array(
					'id' => $value->getId(),
					'quantity' => $value->getQuantity(),
					'price' => $value->getPrice(),
					'data' => unserialize($value->getData()),
					'step' => $value->getStep(),
					'orderId' => $value->getOrderId(),
					'product' => $productRepo->getProductById($value->getProductId()),
					'supplier' => $compRepo->getCompanyById($value->getSupplierId()),
					'supplierUserId' => $value->getSupplierUserId(),
					'status' => $statusRepo->getStatusById($value->getOrderProductStatusId()),
					'createdAt' => $value->getCreatedAt()->format('c'),
					'suppliers' => $stepRepo->getSuppliersByOrderPId($value->getId())
				);
			}
		}
		
		return $result;
	}

	public function deleteOrderProduct($id)
	{
		$repo = $this->_em->getRepository('App\Entity\Commerce\OrderProduct');
		$orderRepo = $this->_em->getRepository('App\Entity\Commerce\Order');
		$res = $repo->find($id);

		$orderId =  $res->getOrderId();
		$this->_em->remove($res);
		$this->_em->flush();

		$checkForOrders = $repo->findBy(array('orderId' => $orderId));
		
		if(count($checkForOrders) <= 0){
			$res2 = $orderRepo->find($orderId);
			$this->_em->remove($res2);
			$this->_em->flush();
		}

		echo true;
	}

	public function getAllOrderProducts()
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('p.id, o.id as orderId, pr.name as product, ob.name as object, c.name as company, p.supplierId, p.orderProductStatusId, s.name as status')
		   ->from('App\Entity\Commerce\OrderProduct','p')
		   ->leftJoin('App\Entity\Commerce\Order','o','WITH','p.orderId = o.id')
		   ->leftJoin('App\Entity\Realestate\Object','ob','WITH','o.objectId = ob.id')
		   ->leftJoin('App\Entity\Commerce\Product','pr','WITH','p.productId = pr.id')
		   ->leftJoin('App\Entity\Management\Company','c','WITH','o.companyId = c.id')
		   ->leftJoin('App\Entity\Commerce\Status','s','WITH','s.id = p.orderProductStatusId');


		$queryResults = $qb->getQuery()->getArrayResult();

		if(!empty($queryResults)) {
			return $queryResults;
		}

		return array();
	} 

	/**
     * Updates order product status by order product id
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @param integer $statusId
     * @param integer $orderId
     * @param integer $orderPId
     * @return void
     */
	public function updateOrderProductStatusById($statusId = 0, $orderPId = 0, $step = 0)
	{

		$repo = $this->_em->getRepository(\App\Entity\Commerce\OrderProduct::class);
		$nRepo = $this->_em->getRepository(\App\Entity\Management\Notification::class);

		$result = $repo->find($orderPId);	
		if(!empty(array($result))) {
			if(($result->getProductId() == 10 && $step == 3 ) || ($result->getProductId() == 11 && $step == 3 ) ||
				($result->getProductId() == 1 && $step == 4 ) || ($result->getProductId() == 2 && $step == 4 ) ||
				($result->getProductId() == 3 && $step == 4 ) || ($result->getProductId() == 4 && $step == 4 ) ||
				($result->getProductId() == 5 && $step == 4 ) || ($result->getProductId() == 6 && $step == 4 ) ||
				($result->getProductId() == 8 && $step == 4 ) || ($result->getProductId() == 9 && $step == 4 ) ||
				($result->getProductId() == 7 && $step == 3)  
			) {
				$statusId = 8;
			}
			
			if($statusId == 4){
				$result->setOrderProductStatusId($statusId);
				$result->setSupplierId(0);
				$result->setSupplierUserId(0);
			} else {
				$result->setOrderProductStatusId($statusId);
				$result->setSupplierId(0);
				$result->setSupplierUserId(0);
				$result->setStep($step);
			}
			
			$this->_em->merge($result);
			$this->_em->flush();

			//This checks if the the order status should be updated to delivered if 
			//all the order products under it is delivered.
			$this->checkForUpdateOrderStatus($result->getOrderId());
		}
		
	}

	public function checkForUpdateOrderStatus($id)
	{
		$repo = $this->_em->getRepository(\App\Entity\Commerce\OrderProduct::class);
		$orderRepo = $this->_em->getRepository(\App\Entity\Commerce\Order::class);
		$results = $repo->findBy(array('orderId'=> $id));
		$isDelivered = false;
		$pCount = count($results);
		$c = 0;
		if(!empty($results)) {
			foreach ($results as $key => $value) {
				if($value->getOrderProductStatusId() == 10){
					$c++;
				} 
			}
		}

		if($pCount == $c) {
			$orderRepo->updateOrderStatus(array('orderId' => $id,'id' => 9));
		} else {
			$orderRepo->updateOrderStatus(array('orderId' => $id,'id' => 5));
		}
	}
}

?>