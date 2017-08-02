<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;


class OrderProductStepRepository extends EntityRepository
{

	public function getSuppliersByOrderPId($id)
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('c.name')
		   ->from('App\Entity\Commerce\OrderProductStep','os')
		   ->leftJoin('App\Entity\Management\Company','c','WITH','os.supplierId = c.id')
		   ->where('os.orderProductId = :id')
		   ->setParameter('id', $id);

		$queryResults = $qb->getQuery()->getArrayResult();

		if(!empty($queryResults)) {
			foreach ($queryResults as $key => $value) {
				$data[] = $value['name'];
			}
			return $data;
		}
		return array();
	}
}