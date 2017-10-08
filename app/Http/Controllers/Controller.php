<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\PropertyType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Property;
use App\Review;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $property_types;

    public $right_bar;

    function __construct(){
      $types = DB::table('property_types')->get();
      $this->property_types = $types;
      Session::put('property_type',$types);

      $this->right_bar = array();
      $properties = Property::all();
      $most_rated = Property::orderBy('rating','DESC')->take(3)->get();
      $most_recommended = Property::where('recommended',1)->take(3)->get();
      $latest_reviews = Review::where('created_at','DESC')->take(2)->get();

      $this->right_bar['most_rated'] = $most_rated;
      $this->right_bar['most_recommended'] = $most_recommended;
      $this->right_bar['latest_reviews'] = $latest_reviews;
      $this->right_bar['properties'] = $properties;

      //return $this->right_bar;

      Session::put('side_bar',$this->right_bar);
    }
}
