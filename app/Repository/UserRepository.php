<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;
use Illuminate\Support\Facades\Hash;


class UserRepository extends EntityRepository
{

	protected $em;

	public function __construct(EntityManager $em)
	{
		$this->em = $em;
	}

	public function create($data, $companyId)
	{
		$user = new \App\Entity\Management\User();
		$user->setFirstName($data['first_name']);
		$user->setLastName($data['last_name']);
		$user->setEmail($data['email']);
		$user->setUsername($data['first_name'].$data['first_name']);
		$user->setEmailVerified(0);
		$user->setPassword(Hash::make($data['password']));
		$user->setActive(0);
		$user->setCompanyId($companyId);
		
		$this->em->persist($user);
		$this->em->flush();
		return $user;
	}

	public function addUserActivation($userId)
	{
		$code = new \App\Entity\Management\UserActivationCode();
		$code->setUserId($userId);
		$code->setCode(str_random(30));
		$this->em->persist($code);
		$this->em->flush();
		return $code->getCode();
	}

	public function checkIfCodeExist($code)
	{
		$res = array();
		$repo = $this->em->getRepository(\App\Entity\Management\UserActivationCode::class);
		$search = $repo->findBy(array('code'=> $code));print_r($search[0]->getUserId());exit;
		if(isset($search[0])){
			return $res = array('exist'=> true, 'user_id'=> $search[0]->getUserId());
		}
		return $res;
	}

	public function updateEmailVerified($userId)
	{
		$repo = $this->em->find('App\Entity\Management\User', $userId);
		if(!empty((array)$repo)){
			$repo->setEmailVerified(1);
			$this->em->merge($repo);
			$this->em->flush();
		}
		return true;
	}

	public function checkCredentials($credentials)
    {
    	$repo = $this->em->getRepository(\App\Entity\Management\User::class);
		$search = $repo->findBy(array('email'=> $credentials['email']));
		if(isset($search) && !empty($search)){
			foreach ($search as $key => $value) {
				if(Hash::check($credentials['password'], $value->getPassword())) {
					if($value->getEmailVerified() == true) {
						return array('exist'=>'yes', 'user_id'=>$value->getId());
					} else {
						return array('exist'=>'not verified');
					}
				}
			}
		} 
		return array('exist'=>'no');
        
    }

    public function getUserById($userId)
    {
    	$repo = $this->em->find('App\Entity\Management\User', $userId);
		if(!empty((array)$repo)){
			return $repo;
		} 
		return null;
    }

}



?>