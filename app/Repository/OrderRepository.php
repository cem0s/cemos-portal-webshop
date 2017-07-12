<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Facades\Hash;


class OrderRepository extends EntityRepository
{

	/**
     * Create new data for order 
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @return integer
     */
	public function createOrder($data)
	{
		$order = new \App\Entity\Commerce\Order();
		$order->setCompanyId($data['company_id']);
		$order->setObjectId($data['object_id']);
		$order->setUserId($data['user_id']);
		$order->setOrderStatusId(1);
		$this->_em->persist($order);
		$this->_em->flush();

		return $order->getId();
	}

	public function getOrders($objId)
	{
		$orderLines = array();
		$orderPRepo = $this->_em->getRepository('App\Entity\Commerce\OrderProduct');
		$ordersByObject = $this->getOrdersByObjId($objId);
		if(!empty($ordersByObject)) {
			foreach ($ordersByObject as $key => $value) {
				$orderLines[] = $orderPRepo->getOrderProductByOrderId($value['id']);
			}
		}

		return $orderLines;

	}

	public function getOrdersByObjId($objId)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('o')
		   ->from('App\Entity\Commerce\Order', 'o')
		   ->where('o.objectId = :objId')
		   ->setParameter('objId', $objId);

		$queryResult = $qb->getQuery()->getArrayResult();
		if(!empty($queryResult)) {
			return $queryResult;
		} 
		return array();
	}

	

}

?>