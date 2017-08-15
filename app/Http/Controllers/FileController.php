<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dropbox;
use ZipArchive;

class FileController extends Controller
{
    public function getImages(Request $request)
    {
    	$dbox = new Dropbox;
        $container = "delivered-wmark";
        $pId= $request->all()['pId'];
    	$data = array(
    			"companyId" => $request->all()['companyId'],
		    	"objectId" => $request->all()['objectId'],
		    	"orderId" => $request->all()['orderId'],
		    	"orderPId"=> $request->all()['orderPId']
    		);
        if($pId == 3 || $pId == 4) {
            $container = "delivered";
        }

    	echo $dbox->getFiles($data, $container);

    }

    public function view360($path) 
    {
        $dbox = new Dropbox;
        $texture_dir = public_path().'/texture';
        $p = str_replace('+', '/', $path);
        $f = str_replace('|', '.', $p);
        $name = basename($f);
 
   
        if(!is_dir($texture_dir)) {
            mkdir($texture_dir, 0777, true);
        }
           
        if(!file_exists($texture_dir.'/'.$name)){
            $fd = fopen($texture_dir.'/'.$name, 'wb');
            $down = $dbox->getFile($f, $fd);
            fclose($fd);
           
        }

        $path = config('app.url').'/cemos-portal/public/texture/'.$name; 

        return view('pages.viewer.view-360')->with('path', $path);
    }

    public function zipFile(Request $request)
    {
        ini_set('max_execution_time', 0);
        $dbox = new Dropbox;
        $objId = $request->all()['objId'];
        $orderId = $request->all()['oId'];
        $orderPId = $request->all()['orderPId'];
        $companyId = $request->all()['compId'];
        $zipName = $request->all()['slug'];

        $tmpDir =  public_path().'/tmp';
        $tmpImageDir = public_path().'/tmp/'.$companyId.'/'.$objId.'/'.$orderId.'/'.$orderPId.'/delivered';
        $zipFileName = $zipName.'.zip';
        $filetopath=$tmpImageDir.'/'.$zipFileName;

        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );

        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }

        $files = $dbox->getFiles(
                array(
                    'companyId' => $companyId,
                    'objectId' => $objId,
                    'orderId' => $orderId,
                    'orderPId' => $orderPId,
                    'isArray' => true,
                ), 
                'delivered'
            );
        
        if((isset($files['contents'])) && (count($files['contents']) > 0)) {
            foreach ($files['contents'] as $key => $value) {
                if(!is_dir($tmpImageDir)) {
                    mkdir($tmpImageDir, 0777, true);
                }
                $fd = fopen($tmpDir.$value['path'], 'wb');
                $down = $dbox->getFile($value['path'], $fd);
                fclose($fd);
            }
        }
      
        $this->zip($tmpImageDir, $zipFileName);
       
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
        return ['status'=>'file does not exist'];
    }

    public function zip($public_dir = null, $zipFileName = null)
    {
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) { 
            $files = scandir($public_dir);
            if(!empty($files)) {
                foreach ($files as $key => $value) {
                    if($value != "." && $value != "..") {
                        $zip->addFile($public_dir.'/'.$value, $value);        
                        
                    }
                }
                $zip->close();
            }
        }
    }

   
}
