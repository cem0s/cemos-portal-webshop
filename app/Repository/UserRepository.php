<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use Illuminate\Support\Facades\Hash;


class UserRepository extends EntityRepository
{

	public function create($data)
	{
		$result = array();

		$isEmailExist = $this->checkEmail($data['email']);
	
		if($isEmailExist['exist']) {

			$result = array(
					'exist' => true
				);

		} else {

			$companyRepo = $this->_em->getRepository('App\Entity\Management\Company');
			$addressRepo = $this->_em->getRepository('App\Entity\Management\Address');

			$companyId = $companyRepo->create($data);
			$addressId = $addressRepo->create($data, $companyId);
			$invoiceAddressId = $addressRepo->createInvoiceAddress($data, $companyId);

			$user = new \App\Entity\Management\User();
			$user->setFirstName($data['first_name']);
			$user->setLastName($data['last_name']);
			$user->setEmail($data['email']);
			$user->setUsername($data['first_name'].$data['last_name']);
			$user->setEmailVerified(0);
			$user->setPassword(Hash::make($data['password']));
			$user->setActive(0);
			$user->setCompanyId($companyId);
			
			$this->_em->persist($user);
			$this->_em->flush();

			$code = $this->addUserActivation($user->getId());

			$result = array(
					'exist' => false,
					'user' => array(
						'id' 			=> $user->getId(),
						'firstname' 	=> $user->getFirstName(),
						'lastname' 		=> $user->getLastName(),
						'email' 		=> $user->getEmail(),
						'emailVerified' => $user->getEmailVerified(),
						'username' 		=> $user->getUsername(),
						'active' 		=> $user->getActive(),
						'company_id' 	=> $user->getCompanyId(),
						),
					'userObj' => $user,
					'code' => $code
				);
		}

			
		return $result;
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

			$this->addLog(array(
				'user_id' => $repo->getId(),
				'company_id' => $repo->getCompanyId(),
				'data' => 'Your account has verified.',
				'category' => 'user',
				'action' => 'update'
			));

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
    	$user = $this->_em->find('App\Entity\Management\User', $userId);
		if(!empty((array)$user)){
			return $user;
		} 
		return null;
    }

    public function getAllUserInfo($userId)
    {
    	$companyRepo = $this->_em->getRepository('App\Entity\Management\Company');
    	$addressRepo = $this->_em->getRepository('App\Entity\Management\Address');
    	$logs = $this->_em->getRepository('App\Entity\Management\CompanyActivityLog');
    	$user = $this->_em->find('App\Entity\Management\User', $userId);

		if(!empty((array)$user)){
			return array(
					'user' => array(
						'id' 			=> $user->getId(),
						'firstname' 	=> $user->getFirstName(),
						'lastname' 		=> $user->getLastName(),
						'email' 		=> $user->getEmail(),
						'emailVerified' => $user->getEmailVerified(),
						'username' 		=> $user->getUsername(),
						'active' 		=> $user->getActive(),
						'company_id' 	=> $user->getCompanyId(),
						'created_at' 	=> $user->getCreatedAt()->format('c'),
					),
					'company' => $companyRepo->getCompanyById($user->getCompanyId()),
					'address' => $addressRepo->getAddressByCompanyId($user->getCompanyId()),
					'invoiceaddress' => $addressRepo->getInvoiceAddressByCompanyId($user->getCompanyId()),
					'logs' => $logs->getLogs($userId)
				);
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

			$this->addLog(array(
				'user_id' => $search[0]->getId(),
				'company_id' => $search[0]->getCompanyId(),
				'data' => 'You updated your password.',
				'category' => 'user',
				'action' => 'update'
			));
			return $search[0];
    	}
    	return false;
    }

    public function updateProfilePic($userId, $path)
    {
    	$user = $this->getUserById($userId);
    	if(!empty((array)$user)){
			$user->setProfilePic($path);
			$this->_em->merge($user);
			$this->_em->flush();

			$this->addLog(array(
				'user_id' => $user->getId(),
				'company_id' => $user->getCompanyId(),
				'data' => 'You updated your profile picture.',
				'category' => 'user',
				'action' => 'update'
			));
			return true;
		} 
		return false;
    }

    public function updateUser($data)
    {

		$companyRepo = $this->_em->getRepository('App\Entity\Management\Company');
		$addressRepo = $this->_em->getRepository('App\Entity\Management\Address');

		$companyId = $companyRepo->create($data);
		$addressId = $addressRepo->create($data, $companyId);

		$user = $this->getUserById($data['user']['id']);
    	if(!empty((array)$user)){
			$user->setFirstName($data['user']['firstname']);
			$user->setLastName($data['user']['lastname']);
			$user->setEmail($data['user']['email']);
			$user->setUsername($data['user'] ['firstname'].$data['user']['lastname']);
			$user->setCompanyId($companyId);
			
			$this->_em->merge($user);
			$this->_em->flush();
		} 
		$this->addLog(array(
				'user_id' => $user->getId(),
				'company_id' => $user->getCompanyId(),
				'data' => 'You updated your profile.',
				'category' => 'user',
				'action' => 'update'
			));
			
		return array(
			'user' => array(
				'id' 			=> $user->getId(),
				'firstname' 	=> $user->getFirstName(),
				'lastname' 		=> $user->getLastName(),
				'email' 		=> $user->getEmail(),
				'emailVerified' => $user->getEmailVerified(),
				'username' 		=> $user->getUsername(),
				'active' 		=> $user->getActive(),
				'company_id' 	=> $user->getCompanyId(),
				),
		);
    }

    private function addLog($data)
    {
    	$log = $this->_em->getRepository('App\Entity\Management\CompanyActivityLog');
    	$log->create($data);
    	return 1;
    }
}



?>