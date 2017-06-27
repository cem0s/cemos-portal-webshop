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
        // $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        // $all_property = $object_repo->findAll();
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

    /* TO DO:
    * Identify what type of object to be created
    */
    public function postAddProperty(Request $request)
    {
        $data = $request->all();
        $data['slug'] = strtolower(str_replace(' ', '-', $data['address1']));
        $data['object_type'] = "residential"; // to be determine what type

        $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        $object_repo->create($data);

        return view('pages.property.property-details');
    }


}
