<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;

class PropertyController extends Controller
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.property.property-overview');
    }

    public function propertyDetails()
    {
    	return view('pages.property.property-details');
    }

    public function addProperty()
    {
        return view('pages.property.add-property');
    }

    public function postAddProperty(Request $request)
    {
        $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        $object_repo->create($request->all());
    }


}
