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

	public function getObjectByid($id) 
	{	
		// another way of retrieving data
		//$object = $this->_em->getRepository('\App\Entity\Realestate\Object')->findBy(array('id' => $id));
		$object = array();

		$data = $this->_em->find('\App\Entity\Realestate\Object', $id);

		if(isset($data) && !empty($data)) {
			$object = array(
				'address1' => $data->getAddress1(),
				'address2' => $data->getAddress2(),
				'postalcode' => $data->getZipcode(),
				'town' => $data->getTown(),
				'country' => $data->getCountry(),
				'slug' => $data->getSlug(),
				'company_id' => $data->getCustomerId(),
				'user_id' => $data->getUserId(),
			);
		}

		return $object;
	}
}