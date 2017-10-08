<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Input;
use App\Property;

class SearchController extends Controller
{
    //
      public function search(Request $request,Property $property)
	    {
        $property = $property->newQuery();

            // Search for a property based on the title.
            if ($request->has('title')) {
                $property->where('title', $request->input('title'))->where('active', 1);
            }

            // Search for a property based on the district.
            if ($request->has('district')) {
                $property->where('district', $request->input('district'))->where('active', 1);
            }

            // Search for a property based on the town.
            if ($request->has('town')) {
                $property->where('town', $request->input('town'))->where('active', 1);
            }

            // Search for a property based on the type.
            if ($request->has('type')) {
                $property->where('property_type_id', $request->input('type'))->where('active', 1);
            }

            // Search for a property based on the number of bedrooms.
            if ($request->has('bedrooms')) {
                $property->where('bedrooms', $request->input('bedrooms'))->where('active', 1);
            }

            // Search for a property based on the number of bathrooms.
            if ($request->has('bathrooms')) {
                $property->where('bathrooms', $request->input('bathrooms'))->where('active', 1);
            }

            // Search for a property based on the status.
            if ($request->has('status')) {
                if($request->input('status')=='for_rent')
                $property->where('for_rent', 1)->where('active', 1);
                else
                    $property->where('for_sale', 1)->where('active', 1);
            }

            // Search for a property based on the price.
            if ($request->has('price_min') && $request->has('price_max')) {
                $property->whereBetween('price', [$request->input('price_min'),$request->input('price_max')])->where('active', 1);
            }

            // Search for a property based on the area size.
            if ($request->has('area_size_min') && $request->has('area_size_max')) {
                $property->whereBetween('area_size_max', [$request->input('area_size_min'),$request->input('area_size_max')])->where('active', 1);
            }

            // Search for a property based on the garage.
            if ($request->has('Garage')) {
                $property->where('garage','>', 0)->where('active', 1);
            }

            // Get the results and return them.
            $properties = $property->paginate(5);
            if (count ( $properties ) > 0)
                return view('users.search_results')->with(['properties'=>$properties,'t'=>'all']);
            else
                return view('users.search_results')->with(['properties'=>$properties,'t'=>'all']);
	    }
}
