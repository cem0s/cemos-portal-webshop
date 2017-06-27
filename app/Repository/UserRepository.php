<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Facades\Hash;


class UserRepository extends EntityRepository
{

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
		
		$this->_em->persist($user);
		$this->_em->flush();
		return $user;
	}

	public function addUserActivation($userId)
	{
		$code = new \App\Entity\Management\UserActivationCode();
		$code->setUserId($userId);
		$code->setCode(str_random(30));
		$this->_em->persist($code);
		$this->_em->flush();
		return $code->getCode();
	}

	public function checkIfCodeExist($code)
	{
		$res = array();
		$repo = $this->_em->getRepository(\App\Entity\Management\UserActivationCode::class);
		$search = $repo->findBy(array('code'=> $code));
		if(isset($search[0])){
			return $res = array('exist'=> true, 'user_id'=> $search[0]->getUserId());
		}
		return $res;
	}

	public function updateEmailVerified($userId)
	{
		$repo = $this->_em->find('App\Entity\Management\User', $userId);
		if(!empty((array)$repo)){
			$repo->setEmailVerified(1);
			$repo->setActive(1);
			$this->_em->merge($repo);
			$this->_em->flush();
		}
		return true;
	}

	public function checkCredentials($credentials)
    {
    	$repo = $this->_em->getRepository(\App\Entity\Management\User::class);
		$search = $repo->findBy(array('email'=> $credentials['email']));
		if(isset($search) && !empty($search)){
			foreach ($search as $key => $value) {
				if(Hash::check($credentials['password'], $value->getPassword()) && $value->getActive() == 1) {
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
    	$repo = $this->_em->find('App\Entity\Management\User', $userId);
		if(!empty((array)$repo)){
			return $repo;
		} 
		return null;
    }

    public function checkEmail($email)
    {
    	$repo = $this->_em->getRepository(\App\Entity\Management\User::class);
    	$codeRepo = $this->_em->getRepository(\App\Entity\Management\UserActivationCode::class);
		$search = $repo->findBy(array('email'=> $email));

		if(isset($search[0]) && !empty($search[0])){
			$getCode = $codeRepo->findBy(array('userId'=> $search[0]->getId()));
			return array('exist' => true, 'user' => $search[0],'code'=> $getCode[0]->getCode());
		} 
		return array('exist'=>false);
    }

    public function updatePassword($data)
    {
    	$repo = $this->_em->getRepository(\App\Entity\Management\User::class);
    	$search = $repo->findBy(array('email'=> $data['uemail']));
    	if(isset($search[0]) && !empty($search[0])){
    		$search[0]->setPassword(Hash::make($data['password']));
    		$this->_em->merge($search[0]);
			$this->_em->flush();
			return $search[0];
    	}
    	return false;
    }
}



?>