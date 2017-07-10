<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use App\UploadHandler;

class ShopController extends Controller
{

    protected $productRepo;
    protected $objectRepo;
 

    public function __construct(EntityManager $em)
    {
        $this->productRepo =  $em->getRepository('App\Entity\Commerce\Product');
        $this->objectRepo =  $em->getRepository('App\Entity\Realestate\Object');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        session(['object_id'=> $id]);
        $products = $this->productRepo->getAllProducts();

        return view('pages.shop.shop-page')->with('data', $products);
    }

    public function shopCart()
    {
    	return view('pages.shop.shop-cart');
    }

    public function photography()
    {
        return view('pages.shop.shop-photography');
    }

    /**
     * This retrieves the product form for chosen products
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @return Response
     */
    public function productsForm()
    {
        $data = $_GET;
        $object_id = session('object_id');
        $objectDetails = $this->objectRepo->getObjectByid($object_id);

        //Initialize all category ids
        $photoIds = "";
        $videoIds = "";
        $archiIds = "";
        $marketIds = "";

        //Initialize category product array for display
        $photoArray = array();
        $videoArray = array();
        $archiArray = array();
        $marketArray = array();

        $html = "";
      
        foreach ($data['selected'] as $key => $value) {
            switch ($value) {
                case 1:
                    $photoIds.= $value.",";
                    array_push($photoArray, $value);
                    break;
                case 2:
                    $photoIds.= $value.",";
                    array_push($photoArray, $value);
                    break;
                case 3:
                    $photoIds.= $value.",";
                    array_push($photoArray, $value);
                    break;
                case 4:
                    $photoIds.= $value.",";
                    array_push($photoArray, $value);
                    break;
                case 5:
                    $photoIds.= $value.",";
                    array_push($photoArray, $value);
                    break;
                case 6:
                    $photoIds.= $value.",";
                    array_push($photoArray, $value);
                    break; 
                case 7:
                    $archiIds.= $value .",";
                    array_push($archiArray, $value);
                    break;
                case 8:
                    $videoIds .= $value .",";
                    array_push($videoArray, $value);
                    break;
                case 9:
                    $videoIds .= $value .",";
                    array_push($videoArray, $value);
                    break;
                case 10:
                    $marketIds .= $value .",";
                    array_push($marketArray, $value);
                    break;
                case 11:
                    $marketIds .= $value .",";
                    array_push($marketArray, $value);
                    break;
                default:
                    $product = "";
                    break;
            }
           
        }
        //Display the object preview
        $html.= $this->getObjectDetailsTemplate($objectDetails);
        $html.= "<hr><p style='color:green;'>We have detected that you chose the following services for this property. Kindly fill up additional data for your order.</p>";

        if(isset($data['selected']['regular_photo']) || isset($data['selected']['drone_photo']) || isset($data['selected']['360_degree_photo'])  || 
           isset($data['selected']['twilight_photo'])|| isset($data['selected']['day_to_dustphoto']) || isset($data['selected']['360_virtual'])) {
                $html.= $this->getPhotographyForm($data, $objectDetails, $photoIds, $photoArray);
        }

        if(isset($data['selected']['video_editing']) || isset($data['selected']['photo_slider'])) {
                $html.= $this->getVideoForm($data, $objectDetails, $videoIds, $videoArray);
        }

        if(isset($data['selected']['give_away_brochure']) || isset($data['selected']['address_card'])) {
                $html.= $this->getMarketingForm($data, $objectDetails, $marketIds, $marketArray);
        }

        if(isset($data['selected']['floorplanner'])) {
                $html.= $this->getArchiForm($data, $objectDetails, $archiIds, $archiArray);
        }
       
       
        return $html;
    }

    /**
     * This retrieves the object details preview
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $objectDetails array
     * @return Response
     */
    private function getObjectDetailsTemplate($objectDetails) 
    {
        $html = '';
        $html.= '<div id="objDetails">';
            $html.= '<hr><div class="row">';
            $html.= '<h3>Property Review</h3>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Property </h4>';
                    $html.= '</div>';
                    $html.= '<b>Address:</b><br>';
                    $html.= $objectDetails['address1'].', '.$objectDetails['town'].', '.$objectDetails['country'].', '.$objectDetails['postalcode'];
                    $html.= '<br><hr><b>Contact Information</b><br>';
                    $html.= '<i class="fa fa-user"></i> <b>'.$objectDetails['objectProp']['ownerName'].'</b><br>';
                    $html.= '<i class="fa fa-phone"></i> '.$objectDetails['objectProp']['ownerTel'].'<br>';
                    $html.= '<i class="fa fa-mobile"></i> '.$objectDetails['objectProp']['ownerMob'].'<br>';
                    $html.= '<i class="fa fa-envelope"></i> '.$objectDetails['objectProp']['ownerEmail'].'<br>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Additional Information</h4>';
                    $html.= '</div>';
                    $html.= '<table class="table table-striped table-bordered table-hover" style="font-size:14px;">';
                    $html.= '<tr>';
                    $html.= '<th>Property Type</th>';
                    $html.= '<td>'.$objectDetails['objecttype']['name'].'</td>';
                    $html.= '</tr>';
                    $html.= '<tr>';
                    $html.= '<th>Built </th>';
                    $html.= '<td>'.$objectDetails['objectProp']['built'].'</td>';
                    $html.= '</tr>';
                    $html.= '<tr>';
                    $html.= '<th>Built In </th>';
                    $html.= '<td>'.$objectDetails['objectProp']['builtin'].'</td>';
                    $html.= '</tr>';
                    $html.= '<tr>';
                    $html.= '<th>Area </th>';
                    $html.= '<td>'.$objectDetails['objectProp']['area'].'</td>';
                    $html.= '</tr>';
                    $html.= '<tr>';
                    $html.= '<th>Rooms </th>';
                    $html.= '<td>'.$objectDetails['objectProp']['rooms'].'</td>';
                    $html.= '</tr>';
                    $html.= '<tr>';
                    $html.= '<th>Floors </th>';
                    $html.= '<td>'.$objectDetails['objectProp']['floors'].'</td>';
                    $html.= '</tr>';
                    $html.= '<tr>';
                    $html.= '<th>Occupied</th>';
                    $html.= '<td>'.$objectDetails['objectProp']['occupied'].'</td>';
                    $html.= '<tr>';
                    $html.= '</table>';
                    $html.= '<input type="hidden" id="objectId" name="objectId" value='.$objectDetails['id'].'>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * This retrieves the photography form 
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $data array
     * @param $objectDetails array
     * @param $photoIds array
     * @param $photoArray array
     * @return Response
     */
    private function getPhotographyForm($data, $objectDetails, $photoIds, $photoArray)
    {
        $html = '';

        $html.= '<hr><div id="photography">';
            $html.= '<div class="row">';
                $html.= '<h4>Photography Services</h4>';
                $html.= $this->getListOfProduct($photoArray);
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                    $html.= '<br>';
                    $html.= 'Preference Date <br><input id="preference_date" class="form-control" name="preference_date" placeholder="dd-mm-yyyy" type="text">';
                    $html.= '<input type="hidden" name="id" id="id" value='.substr($photoIds, 0, -1).'>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Comments for Photographer</h4>';
                    $html.= '</div>';
                    $html.= '<br><br><textarea name="photoComment" id="photoComment" class="form-control" style="resize:none;" placeholder="Write here..."></textarea>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * This retrieves the video editing form 
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $data array
     * @param $objectDetails array
     * @param $videoIds array
     * @param $videoArray array
     * @return Response
     */
    private function getVideoForm($data, $objectDetails, $videoIds, $videoArray)
    {
        $html = '';

        $html.= '<hr><div id="video">';
            $html.= '<div class="row">';
                $html.= '<h4>Video Editing Services</h4>';
                $html.= $this->getListOfProduct($videoArray);
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                    $html.= '<br>';
                    $html.= 'Preference Date <br><input id="preference_date" class="form-control" name="preference_date" placeholder="dd-mm-yyyy" type="text">';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Comments for Videographer</h4>';
                    $html.= '</div>';
                    $html.= '<br><br><textarea name="videoComment" id="videoComment" style="resize:none;" class="form-control"  placeholder="Write here..."></textarea>';
                    $html.= '<input type="hidden" name="id" id="id" value='.substr($videoIds, 0, -1).'>';
                $html .= '</div>';
            $html .= '</div>';
        $html.= '</div>';

  
        return $html;
    }

    /**
     * This retrieves the marketing form 
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $data array
     * @param $objectDetails array
     * @param $marketIds array
     * @param $marketArray array
     * @return Response
     */
    private function getMarketingForm($data, $objectDetails, $marketIds, $marketArray)
    {
        $html = '';

        $html.= '<hr><div id="market">';
            $html.= '<div class="row">';
                $html.= '<h4>Marketing Services</h4>';
                $html.= $this->getListOfProduct($marketArray);
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                    $html.= '<br>';
                    $html.= 'Preference Date <br><input id="preference_date" class="form-control date-picker" name="preference_date" placeholder="dd-mm-yyyy" type="text">';
                    $html.= '<input type="hidden" name="id" id="id" value='.substr($marketIds, 0, -1).'>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Text</h4>';
                    $html.= '</div>';
                    $html.= '<br><br><textarea name="giveAwayText" id="giveAwayText" style="resize:none;" class="form-control"  placeholder="Write here..." required="required"></textarea>';
                    $html.= '<br><div class="alert alert-danger hidden">Please fill out this field</div>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Templates</h4>';
                    $html.= '</div>';
                    $html .= '<br><br>Select Template Here.<br><select name="template" id ="template" class="form-control">';
                    $html .= '<option value="Template 1">Template 1</option>';
                    $html .= '<option value="Template 2">Template 2</option>';
                    $html .= '<option value="Template 3">Template 3</option>';
                    $html .= '<option value="Template 4">Template 4</option>';
                    $html .= '</select>';
                $html .= '</div>';
            $html .= '</div>';
        $html.= '</div>';

        return $html;
    }

    /**
     * This retrieves the floorplanner form 
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $data array
     * @param $objectDetails array
     * @param $archiIds array
     * @param $archiArray array
     * @return Response
     */
    private function getArchiForm($data, $objectDetails, $archiIds, $archiArray)
    {
        $html = '';

        $html.= '<hr><div id="archi">';
            $html.= '<div class="row">';
                $html.= '<h4>Architectural Services</h4>';
                $html.= $this->getListOfProduct($archiArray);
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                    $html.= '<br>';
                    $html.= 'Preference Date <br><input id="preference_date" class="form-control date-picker" name="preference_date" placeholder="dd-mm-yyyy" type="text">';
                    $html.= '<input type="hidden" name="id" id="id" value='.substr($archiIds, 0, -1).'>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Additional Features</h4>';
                    $html.= '</div>';
                    $html.= '<br>';
                    $html.= 'Furniture <br><input type="checkbox" name="add_furniture" >  Add Furniture to the Floorplan';
                    $html.= '<hr>';
                    $html.= 'Mirror <br><input type="checkbox" name="mirror_hor" >  Mirror the Plan horizontally <br>';
                    $html.= '<input type="checkbox" name="mirror_ver" >  Mirror the Plan vertically <br>';
                    $html.= '<hr>';
                    $html.= 'Site Plan <br>';
                    $html.= '<input type="checkbox" name="situate_plan" >  Situation Markings on the Floor Plan <br>';
                    $html.= '<hr>';
                    $html.= '3D Indication <br>';
                    $html.= '<input type="checkbox" name="3d_indication" > Add 3d indication to the floorplan <br>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Comments for Floorplanner</h4>';
                    $html.= '</div>';
                    $html.= '<br><br><textarea name="floorComments" id="floorComments" style="resize:none;" class="form-control"  placeholder="Write here..."></textarea>';
                $html .= '</div>';
            $html .= '</div>';
            $html.= '<hr>Floors <br><br>';
            $html.= '<div class= "floorplanner_1">';
                $html.= '<div class="row">';
                    $html .= '<div class="col-md-4">';
                        $html.= '<div class="labelForDetails">';
                            $html.= '<h4>Floor 1</h4>';
                        $html.= '</div>';
                        $html.= '<br>';
                        $html.= 'Type <br><input id="floor_1" class="form-control" name="floor_1" type="text" required="required">';
                        $html.= '<br><div class="alert alert-danger hidden">Please fill out this field</div>';
                    $html .= '</div>';
                    $html .= '<div class="col-md-4">';
                        $html.= '<div class="labelForDetails">';
                            $html.= '<h4>Blueprint</h4>';
                        $html.= '</div>';
                        $html.= '<br>';
                        $html.= 'Blueprint <br><input type="file" class="fileupload-floorplanner" name="print_1" id="print_1"> ';
                        $html.= '<input type="hidden" name="file_name_1" id="file_name_1"> ';
                        $html.= '<br>';
                        $html.= '<div id="progress" class="progress">';
                            $html.= '<div class="progress-bar progress-bar-success" id="progress_1"></div>';
                        $html.= '</div>';
                        $html.= '<table role="presentation" id= "files_1" class="table table-striped files"><tbody></tbody></table>';
                    $html .= '</div>';
                    $html .= '<div class="col-md-4">';
                        $html.= '<br><br><br><br><button class="btn btn-primary" id="button_1" onclick="addFloor(1);">Add Another Floor</button>';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        $html.= '</div>';
    
        return $html;
    }

    /**
     * This returns the list of the products depends on the category
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $productArray array
     * @return Response
     */
    private function getListOfProduct($productArray)
    {
        $html = "";
        $html.= "<ul>";
        if(!empty($productArray)) {
            foreach ($productArray as $key => $value) {
                $product = "";
                switch ($value) {
                    case 1:
                        $product = "Regular Photography";
                        break;
                    case 2:
                        $product = "Drone Photography";
                        break;
                    case 3:
                        $product = "360 Degreee Photography";
                        break;
                    case 4:
                        $product = "360 Virtual Tour";
                        break;
                    case 5:
                        $product = "Twilight Photography";
                        break;
                    case 6:
                        $product = "Day to Dust Photography";
                        break; 
                    case 7:
                        $product = "Floor Planner";
                        break;
                    case 8:
                        $product = "Video Editing";
                        break;
                    case 9:
                        $product = "Photo Slider";
                        break;
                    case 10:
                        $product = "Give Away Brochure";
                        break;
                    case 11:
                        $product = "Address Card";
                        break;
                    default:
                        $product = "";
                        break;
                }
                $html.= "<li>".$product."</li>";
            }
            $html.= "</ul>";
        }
       

        return $html;
    }

    /**
     * This uploads the floor images/blueprints for floorplanner products
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $request 
     * @return Response
     */
    public function uploadFloors(Request $request)
    {
       $scriptUrl = $request->url();
       $tmpDir = public_path().'/tmp/';
       switch ($request->method()) {
           case 'POST':
               $data = $request->all();
               $index = $data['param_name'];
               $ext = explode('.', $_FILES[$index]['name']);
               $_SESSION['floorArray'] = array();
               
               if (isset($data['rename']) && !empty($data['rename'])) {
                    $rename = $data['rename'] .'_'.session('object_id'). '.' . end($ext);
                } else {
                    $rename = $data['param_name'] .'_'.session('object_id'). '.' . end($ext);
                }
                $file_name = str_replace(' ', '_', $rename);

                $upload_handler = new UploadHandler(array(
                    'script_url'        => $scriptUrl,
                    'upload_dir'        => $tmpDir,
                    'upload_url'        => $tmpDir,
                    'accept_file_types' => '/\.(gif|jpe?g|png|pdf)$/i',
                    'custom_file_name'  => $file_name,
                    'param_name'        => $data['param_name'],
                ));
               break;
           
           default:
               # code...
               break;
       }
    }

    /**
     * This deletes the floor images/blueprints for floorplanner products
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $request 
     * @return Response
     */
    public function deleteFloorImage(Request $request)
    {
        $tmpDir = public_path().'/tmp/';
        $thumbDir = public_path().'/tmp/thumbnail/';
        if(file_exists($tmpDir.$request->all()['print_'])) {
            unlink($tmpDir.$request->all()['print_']);
            if(file_exists($thumbDir.$request->all()['print_'])) {
                unlink($thumbDir.$request->all()['print_']);
            }
            echo 1;
            exit();
        } 
        echo 0;
            exit();
    }
 
    /**
     * This shows the cart for products
     * @author Gladys Vailoces <gladys@cemos.ph>
     * @param $request 
     * @return Response
     */
    public function showCart()
    {
        $data = $_GET;
        print_r("<pre>");print_r($data);exit;
        return "test";
    }
}
