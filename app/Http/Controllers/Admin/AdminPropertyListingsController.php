<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;

class AdminPropertyListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function getAllProperties(Request $request){
        $properties = Property::orderBy('created_at', 'DESC')->get();
        return view('admin.property_listings')
        ->with('properties',$properties);
    }

    function getProperty(Request $request,$id){
      $property = Property::find($id);
      return view('admin.admin_property_details')
      ->with('property',$property);
    }

    function delete(Request $request,$id){
      $property = Property::find($id);
      return view('admin.admin_property_delete')
      ->with('property',$property);
    }

    function destroy(Request $request){
      $id = $request->input('id');

      if(Property::destroy($id)){
        flash('Property deleted successfully')->success();
        return redirect()->route('admin.property.listings');
      }else{
        flash('Failed to delete property')->error();
        return redirect()->route('admin.property.listings');
      }
    }

}
