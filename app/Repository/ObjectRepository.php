<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use \App\Entity\Realestate\ResidentialObject;

class ObjectRepository extends EntityRepository
{
	public function create($data)
	{
		$object = new ResidentialObject();
		$object->setName("sample name");
		$object->setAddress1("sample address 1");
		$object->setAddress2("sample address 2");
		$object->setZipcode("6000");
		$object->setTown("sample town");
		$object->setCountry("sample country");
		$object->setSlug("sample-slug");
		$object->setObjectTypeId(1);
		$object->setRegionId(1);
		$object->setCustomerId(1);
		$object->setUserId(1);

		$this->_em->persist($object);
		$this->_em->flush();
		return $object;
	}
}