<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

class AdminExpiredPropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function getExpiredProperties(){
        $properties = Property::where('expired',1)->get();
        return view('admin.expired_properties')->with('properties',$properties);
    }
}
