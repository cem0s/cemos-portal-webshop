<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use \App\Entity\Management\CreditPoints;

class CreditPointsRepository extends EntityRepository
{
	public function getAllCredit() 
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('cp.id, cp.points, c.name')
		   ->from('App\Entity\Management\CreditPoints','cp')
		   ->leftJoin('App\Entity\Management\Company','c','WITH','cp.companyId = c.id');

		$queryResults = $qb->getQuery()->getArrayResult();
		if(!empty($queryResults)) {
			return $queryResults;
		}

		return array();
	}

	public function create($data = array())
	{
		//TODO::put trapings if the user has already credit

		$credit =  new CreditPoints();
		$credit->setCompanyId($data['company']);
		$credit->setPoints($data['credit']);

		$this->_em->persist($credit);
		$this->_em->flush();

		return $credit;
	}

	public function getCreditByCompany($company_id = 0)
	{
		$creditRepo = $this->_em->getRepository('App\Entity\Management\CreditPoints');
        $criteria = array(
            'companyId' => $company_id
        );

        $res = $creditRepo->findOneBy($criteria);
        $data = null;
        if(isset($res) && !empty($res))
        {
        	$data = array(
        		'points' => $res->getPoints(),
        	);
        }

		return $data;
	}

	public function update($credit = 0, $company_id = 0)
	{
		$creditRepo = $this->_em->getRepository('App\Entity\Management\CreditPoints');
        $criteria = array(
            'companyId' => $company_id
        );

        $creditProps = $creditRepo->findOneBy($criteria);

		$creditProps->setPoints($credit);

		$this->_em->merge($creditProps);
		$this->_em->flush();

		return $creditProps;
	}
}