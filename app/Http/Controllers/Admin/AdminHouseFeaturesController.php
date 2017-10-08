<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feature;

class AdminHouseFeaturesController extends Controller
{
    function getHouseFeatures(){
        $features = Feature::all();
        
        return view('admin.admin_house_features_listings')->with('features',$features);
    }
}
