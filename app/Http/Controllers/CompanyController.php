<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;


class CompanyController extends Controller
{
    protected $em;
 

    public function __construct(EntityManager $em)
    {
        $this->em =  $em;

    }

    public function index()
    {
    	$compRepo = $this->em->getRepository('App\Entity\Management\Company');

    	echo json_encode($compRepo->getAllCompany());
    }
}
