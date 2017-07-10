<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;

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

    public function productsForm()
    {
        $data = $_GET;
        $object_id = session('object_id');
        $objectDetails = $this->objectRepo->getObjectByid($object_id);

        $photoIds = "";
        $videoIds = "";
        $archiIds = "";
        $marketIds = "";

        $html = "";
        $html.= "Product(s) Selected: ";
        $html.= "<ul>";
        foreach ($data['selected'] as $key => $value) {
            $product = "";
            switch ($value) {
                case 1:
                    $product = "Regular Photography";
                    $photoIds.= $value.",";
                    break;
                case 2:
                    $product = "Drone Photography";
                    $photoIds.= $value.",";
                    break;
                case 3:
                    $product = "360 Degreee Photography";
                    $photoIds.= $value.",";
                    break;
                case 4:
                    $product = "360 Virtual Tour";
                    $photoIds.= $value.",";
                    break;
                case 5:
                    $product = "Twilight Photography";
                    $photoIds.= $value.",";
                    break;
                case 6:
                    $product = "Day to Dust Photography";
                    $photoIds.= $value.",";
                    break; 
                case 7:
                    $product = "Floor Planner";
                    $archiIds.= $value .",";
                    break;
                case 8:
                    $product = "Video Editing";
                    $videoIds .= $value .",";
                    break;
                case 9:
                    $product = "Photo Slider";
                    $videoIds .= $value .",";
                    break;
                case 10:
                    $product = "Give Away Brochure";
                    $marketIds .= $value .",";
                    break;
                case 11:
                    $product = "Address Card";
                    $marketIds .= $value .",";
                    break;
                default:
                    $product = "";
                    break;
            }
            $html.= "<li>".$product."</li>";
        }
        $html.= "</ul>";

        if(isset($data['selected']['regular_photo']) || isset($data['selected']['drone_photo']) || isset($data['selected']['360_degree_photo'])  || 
           isset($data['selected']['twilight_photo'])|| isset($data['selected']['day_to_dustphoto']) || isset($data['selected']['360_virtual'])) {
                $html.= $this->getPhotographyForm($data, $objectDetails, $photoIds);
        }

        if(isset($data['selected']['video_editing']) || isset($data['selected']['photo_slider'])) {
                $html.= $this->getVideoForm($data, $objectDetails, $videoIds);
        }

        if(isset($data['selected']['give_away_brochure']) || isset($data['selected']['address_card'])) {
                $html.= $this->getMarketingForm($data, $objectDetails, $marketIds);
        }

        if(isset($data['selected']['floorplanner'])) {
                $html.= $this->getArchiForm($data, $objectDetails, $archiIds);
        }
       
       
        return $html;
    }

    private function getPhotographyForm($data, $objectDetails, $photoIds)
    {
        $html = '';

        $html.= '<hr><div id="photography">';
            $html.= '<div class="row">';
                $html.= '<h3>Photography Services - Details</h3>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Object Details</h4>';
                    $html.= '</div>';
                    $html.= '<b>Address:</b><br>';
                    $html.= $objectDetails['address1'].', '.$objectDetails['town'].', '.$objectDetails['country'].', '.$objectDetails['postalcode'];
                    $html.= '<br>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Contact Information</h4>';
                    $html.= '</div>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                    $html.= '<br>';
                    $html.= 'Preference Date <br><input id="preference_date" class="form-control date-picker" name="preference_date" placeholder="dd-mm-yyyy" type="text">';
                $html .= '</div>';
            $html .= '</div>';
        $html.= '</div>';
        if(isset($data['selected']['360_virtual'])) {
            $html .= "Virtual Tour Here";
        }
       
        return $html;
    }

    private function getVideoForm($data, $objectDetails, $videoIds)
    {
        $html = '';

        $html.= '<hr><div id="video">';
            $html.= '<div class="row">';
                $html.= '<h3>Video Editing Services - Details</h3>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Object Details</h4>';
                    $html.= '</div>';
                    $html.= '<b>Address:</b><br>';
                    $html.= $objectDetails['address1'].', '.$objectDetails['town'].', '.$objectDetails['country'].', '.$objectDetails['postalcode'];
                    $html.= '<br>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Contact Information</h4>';
                    $html.= '</div>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        $html.= '</div>';
        if(isset($data['selected']['360_virtual'])) {
            $html .= "Virtual Tour Here";
        }
  
        return $html;
    }

    private function getMarketingForm($data, $objectDetails, $marketIds)
    {
        $html = '';

        $html.= '<hr><div id="market">';
            $html.= '<div class="row">';
                $html.= '<h3>Marketing Services - Details</h3>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Object Details</h4>';
                    $html.= '</div>';
                    $html.= '<b>Address:</b><br>';
                    $html.= $objectDetails['address1'].', '.$objectDetails['town'].', '.$objectDetails['country'].', '.$objectDetails['postalcode'];
                    $html.= '<br>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Contact Information</h4>';
                    $html.= '</div>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        $html.= '</div>';
        if(isset($data['selected']['360_virtual'])) {
            $html .= "Virtual Tour Here";
        }
  
        return $html;
    }

     private function getArchiForm($data, $objectDetails, $archiIds)
    {
        $html = '';

        $html.= '<hr><div id="archi">';
            $html.= '<div class="row">';
                $html.= '<h3>Architectural Services - Details</h3>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Object Details</h4>';
                    $html.= '</div>';
                    $html.= '<b>Address:</b><br>';
                    $html.= $objectDetails['address1'].', '.$objectDetails['town'].', '.$objectDetails['country'].', '.$objectDetails['postalcode'];
                    $html.= '<br>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Contact Information</h4>';
                    $html.= '</div>';
                $html .= '</div>';
                $html .= '<div class="col-md-4">';
                    $html.= '<div class="labelForDetails">';
                        $html.= '<h4>Appointment Preference</h4>';
                    $html.= '</div>';
                $html .= '</div>';
            $html .= '</div>';
        $html.= '</div>';
        if(isset($data['selected']['360_virtual'])) {
            $html .= "Virtual Tour Here";
        }
  
        return $html;
    }
}
