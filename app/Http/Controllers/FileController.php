<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dropbox;

class FileController extends Controller
{
    public function getImages(Request $request)
    {
    	$dbox = new Dropbox;

    	$data = array(
    			"companyId" => $request->all()['companyId'],
		    	"objectId" => $request->all()['objectId'],
		    	"orderId" => $request->all()['orderId'],
		    	"orderPId"=> $request->all()['orderPId']
    		);

    	$files = $dbox->getFiles($data,'delivered');

    }
}
