<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

class AdminFeaturedPropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function getFeaturedProperties(){
        $properties = Property::where('active',1)->get();
        return view('admin.featured_properties')->with('properties',$properties);
    }

    function unfeature(Request $request){

        $property = Property::find($request->input('id'));

        if($request->input('select') == 1){
            $property->active = 0;
            $property->save();
        }

        return redirect()->route('admin.featured.properties');
    }
}
