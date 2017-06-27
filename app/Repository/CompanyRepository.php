<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;


class CompanyRepository extends EntityRepository
{

	public function create($data)
	{
		$company = new \App\Entity\Management\Company();
		$company->setName($data['company_name']);
		$company->setPhone($data['company_phone']);
		$this->_em->persist($company);
		$this->_em->flush();

		return $company->getId();
	}
}



?>