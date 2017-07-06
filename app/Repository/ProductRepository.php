<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Facades\Hash;


class ProductRepository extends EntityRepository
{
	/**
     * This gets all the products
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @return product array
     */
	public function getAllProducts()
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('p')
		   ->from('App\Entity\Commerce\Product', 'p');
		$queryResult = $qb->getQuery()->getArrayResult();

		if(!empty($queryResult)) {
			foreach ($queryResult as $key => $value) {
				if($value['category'] == "Photo") {
					$data['Photo'][]  = $value;
				} else if($value['category'] == "Archi") {
					$data['Archi'][] = $value;
				} else if($value['category'] == "Video") {
					$data['Video'][]  = $value;
				} else if($value['category'] == "Market") {
					$data['Market'][]  = $value;
				}
			}
			return $data;
		}
		return array();
	}



}

?>