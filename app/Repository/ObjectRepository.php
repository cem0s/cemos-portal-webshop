<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use \App\Entity\Realestate\ResidentialObject;
use \App\Entity\Realestate\CommercialObject;

class ObjectRepository extends EntityRepository
{
	public function create($data)
	{
		$object = new CommercialObject();

		if ($data['object_type'] === "residential") {
			$object = new ResidentialObject();
		} 

		$object->setName($data['address1']);
		$object->setAddress1($data['address1']);
		$object->setAddress2($data['address2']);
		$object->setZipcode($data['postalcode']);
		$object->setTown($data['town']);
		$object->setCountry($data['country']);
		$object->setSlug($data['slug']);
		$object->setObjectTypeId(1);  //to be replace
		$object->setRegionId(1); //to be replace
		$object->setCustomerId($data['company_id']); //note::customer refers to company
		$object->setUserId($data['user_id']);

		$this->_em->persist($object);
		$this->_em->flush();
		return $object;
	}
}