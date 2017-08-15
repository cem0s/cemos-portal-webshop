<?php

namespace App;

use Illuminate\Http\Request;
use Dropbox\Client;
use Dropbox\WriteMode;

class Dropbox {

	protected $client;

	public function __construct()
	{
		$this->client = new Client(env('DROPBOX_TOKEN'), env('DROPBOX_SECRET'));
	}


	/**
     * Upload File to dropbox for specific folder
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @param $filepath string
     * @param $folder string 
     *		   The folder name specific to where the file will be uploaded
     * @param $user array
     * 		   User info (user id, company id, object id) to determine the root in the dropbox
     * @param $orderId integer
     * @param $product string
     * @return boolean
     */
	public function uploadFile($filePath, $folder ="", $user = array(), $orderId = 0, $product = "")
	{
		$phpInfo = pathinfo($filePath);
		$size = filesize($filePath);
		$file = fopen($filePath, 'rb');
		$fileName = '/'. $phpInfo['basename'];
		$folderExist = false;
		$dropBoxRoot = '/'.$user['company_id'].'/'.$user['object_id'].'/'.$orderId;
	
		$finalFilePath = $dropBoxRoot.'/'.$folder.'/'.$fileName;

		$res = $this->client->uploadFile($finalFilePath, WriteMode::add(), $file, $size);
		
		$links['share'] = $this->client->createShareableLink($finalFilePath);
        $links['view'] = $this->client->createTemporaryDirectLink($finalFilePath);


        if(isset($links['share']) && !empty($links['share'])) {
        	return true;
        }
        return false;
	}


	/**
     * Create all folders in the dropbox
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @return 
     */
	public function createOrderFolders($user, $orderId)
	{
		$dropBoxRoot = '/'.$user['company_id'].'/'.$user['object_id'].'/'.$orderId;
		$this->client->createFolder($dropBoxRoot.'/product-images');
		$this->client->createFolder($dropBoxRoot.'/raw');
		$this->client->createFolder($dropBoxRoot.'/edited');
		$this->client->createFolder($dropBoxRoot.'/delivered');
	}

	/**
     * Get files from specified path in dropbox
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @return 
     */
	public function getFiles($data, $container=null)
	{
		$dropBoxRoot = '/'.$data['companyId'].'/'.$data['objectId'].'/'.$data['orderId'].'/'.$data['orderPId'];
		$results = $this->client->getMetadataWithChildren($dropBoxRoot.'/'.$container);

		if((isset($results['contents'])) && (count($results['contents']) > 0)) {
			foreach ($results['contents'] as $key => $value) {				
				$results['contents'][$key]['type'] = $value['mime_type'];
				$getF = $this->client->createTemporaryDirectLink($value['path']);

				if(isset($getF[0])) {
					$results['contents'][$key]['file_path'] = $getF[0];
				}
			
			}
		}

		if(isset($data['isArray']) && $data['isArray']) {
			return $results;
		}
		echo json_encode($results);
	}

	/**
     * Download file
     * @author Gladys Vailoces <gladys@cemos.ph> 
     * @return 
     */
	public function getFile($path, $destination)
	{
		return $this->client->getFile($path, $destination);
	}

}

?>