<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use \App\Entity\Realestate\ResidentialObject;
use \App\Entity\Realestate\CommercialObject;
use \App\Entity\Realestate\ObjectProperty;

class ObjectRepository extends EntityRepository
{
	public function create($data = array())
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

		//$property = $this->createObjectProperty($object->getId(), $data);

		return $object;
	}

	private function createObjectProperty($objectId = 0, $data = array())
	{
		$property = new ObjectProperty();

		$property->setObjectId($objectId);
		$property->setPropertyType($data['']);
		$property->setBuilt($data['']);
		$property->setBuiltIn($data['']);
		$property->setArea($data['']);
		$property->setRooms($data['']);
		$property->setFloors($data['']);
		$property->setOccupied($data['']);
		$property->setOwnerName($data['']);
		$property->setOwnerTel($data['']);
		$property->setOwnerMob($data['']);
		$property->setOwnerEmail($data['']);

		$this->_em->persist($property);
		$this->_em->flush();
		return $property;
	}

	public function getObjectByid($id = 0) 
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