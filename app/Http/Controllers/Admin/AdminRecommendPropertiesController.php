<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

class AdminRecommendPropertiesController extends Controller
{
    function recommendProperty(){
      $res = array();
      $message = "";
      $error = "";
      $status = "";

      $property_id = $_GET['property_id'];


      $property = Property::find($property_id)
      ->where('recommended',1)
      ->get();

      if($property->count()>0){
        $property = Property::find($property_id);

        $property->recommended = 0;

        $property->save();

        $error = 0;
        $status = 2;
        $message = "Property unrecommended";

      }else{
        $property = Property::find($property_id);

        $property->recommended = 1;

        $property->save();

        $error = 0;
        $status = 1;
        $message = "Property recommended";


      }

      $res['error'] = $error;
      $res['status'] = $status;
      $res['message'] = $message;

      return json_encode($res);
    }

    function getRecommended(){

      $properties = Property::where('recommended',1)->get();

      $res = array();

      $prop_array = array();
      foreach ($properties as $property) {
        array_push($prop_array,$property->id);
      }

      $res["recommended"] = $prop_array;
      return json_encode($res);
      
    }
}
