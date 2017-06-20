<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;


class AddressRepository extends EntityRepository
{
	protected $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function create($data, $companyId)
	{

		$address = new \App\Entity\Management\Address();
		$address->setName($data['address_1']);
		$address->setAddress1($data['address_1']);
		if(isset($data['address_2'])) {$address->setAddress2($data['address_2']);}
		$address->setZipcode($data['postal_code']);
		$address->setTown($data['town']);
		$address->setCountry("Philippines");
		$address->setCompanyId($companyId);
		$this->em->persist($address);
		$this->em->flush();
		return 1;

	}
}
