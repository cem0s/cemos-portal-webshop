<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{

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
        //Prints request data
        //print_r("<pre>"); print_r($request->all());exit;
    }
}
