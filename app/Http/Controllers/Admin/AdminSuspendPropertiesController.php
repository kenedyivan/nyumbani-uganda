<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

class AdminSuspendPropertiesController extends Controller
{
  function suspendProperty(){
    $res = array();
    $message = "";
    $error = "";
    $status = "";

    $property_id = $_GET['property_id'];

    $state = $_GET['state'];

    if($state == 1){
      $property = Property::find($property_id);

      $property->suspended = 1;

      $property->save();

      $error = 0;
      $status = 1;
      $message = "Property suspended";
    }elseif($state == 0){
      $property = Property::find($property_id);

      $property->suspended = 0;

      $property->save();

      $error = 0;
      $status = 2;
      $message = "Property unsuspended";
    }else{
      $error = 0;
      $status = 3;
      $message = "Suspension state unknown";
    }

      $res['error'] = $error;
      $res['status'] = $status;
      $res['message'] = $message;

      return json_encode($res);
  }

  function getSuspendedProperties(){

    $properties = Property::where('suspended',1)->get();

    $res = array();

    $property_array = array();
    foreach ($properties as $property) {
      array_push($property_array,$property->id);
    }

    $res["suspended"] = $property_array;
    return json_encode($res);

  }
}
