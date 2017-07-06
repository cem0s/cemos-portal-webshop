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
		$objectTypeRepo = $this->_em->getRepository('App\Entity\Realestate\ObjectType');
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
				'objecttype' => $objectTypeRepo->getObjectTypeById($data->getObjectTypeId()),
			);
		}

		return $object;
	}

	public function getAllObjects()
	{
		$data = array();
		$qb = $this->_em->createQueryBuilder();

		$qb->select('o')
		   ->from('App\Entity\Realestate\Object', 'o');

		$queryResult = $qb->getQuery()->getArrayResult();
		
		$userRepo = $this->_em->getRepository('App\Entity\Management\User');
		$objectTypeRepo = $this->_em->getRepository('App\Entity\Realestate\ObjectType');

		if(!empty($queryResult)){
			foreach ($queryResult as $key => $value) {
				$data[] = array(
						'id' => $value['id'],
						'name' => $value['name'],
						'address1' => $value['address1'],
						'address2' => $value['address2'],
						'zipcode' => $value['zipcode'],
						'country' => $value['country'],
						'town' => $value['town'],
						'slug' => $value['slug'],
						'objecttype' => $objectTypeRepo->getObjectTypeById($value['objectTypeId']),
						'user' => $userRepo->getAllUserInfo($value['userId']),
						'createdat' => $value['createdAt']->format('c'),
						'discr' => $value['discr']
					);
			}
		}

		
		return array(
				'property' => $data,
				'count' => count($qb->getQuery()->getArrayResult())
			);
	}

}