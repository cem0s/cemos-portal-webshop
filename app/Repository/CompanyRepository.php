<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;


class CompanyRepository extends EntityRepository
{
	protected $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function create($data)
	{
		$company = new \App\Entity\Management\Company();
		$company->setName($data['company_name']);
		$company->setPhone($data['company_phone']);
		$this->em->persist($company);
		$this->em->flush();

		return $company->getId();
	}
}



?>