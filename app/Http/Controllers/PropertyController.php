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
        $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        $all_property = $object_repo->getAllObjects();
     
        return view('pages.property.property-overview')->with('objects', $all_property['property']);
    }

    public function propertyDetails(Request $request)
    {
        $object_id = $request->route('object_id');

        $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        $object_data = $object_repo->getObjectByid($object_id);

    	return view('pages.property.property-details')->with('object', $object_data);
    }

    public function addProperty()
    {
        return view('pages.property.add-property');
    }

    public function editProperty(Request $request)
    {
        $object_id = $request->route('object_id');

        $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        $object_data = $object_repo->getObjectByid($object_id);

        return view('pages.property.edit-property')->with('object', $object_data);
    }

    /* TO DO:
    * Identify what type of object to be created
    * Redirect to property details
    */
    public function postAddProperty(Request $request)
    {

        $data = $request->all();
        $data['company_id'] = $request->session()->get('company_id');
        $data['user_id'] = $request->session()->get('user_id');
        $data['slug'] = strtolower(str_replace(' ', '-', $data['address1']));
        $data['object_type'] = $data['buildingtype'];
        $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        $object_data = $object_repo->create($data);

        if(isset($object_data) && !empty($object_data)) 
        {
            return redirect()->route('property-details',$object_data->getId()); 
        }

        return view('pages.property.add-property');
    }

    public function postEditProperty(Request $request, $object_id = 0)
    {
        $data = $request->all();

        $object_repo = $this->em->getRepository('App\Entity\Realestate\Object');
        $data['slug'] = strtolower(str_replace(' ', '-', $data['address1']));
        $data['object_type'] = $data['buildingtype'];
        $object_data = $object_repo->update($object_id, $data);

        return redirect()->route('property-details',$object_data->getId()); 
    }


}
