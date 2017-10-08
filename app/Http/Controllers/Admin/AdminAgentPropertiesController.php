<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;
use App\Property;

class AdminAgentPropertiesController extends Controller
{
    function propertyTabs(Request $request, $id){

      $agent = Agent::find($id);

      $properties_all = $agent->properties;

      $Properties_for_sale = $agent->properties()->where('for_sale',1)->get();

      $properties_for_rent = $agent->properties()->where('for_rent',1)->get();

      $properties_expired = $agent->properties()->where('expired',1)->get();

      return view('admin.admin_agent_profile_properties')
      ->with(['properties_all'=>$properties_all,
      'properties_for_sale'=>$Properties_for_sale,
      'properties_for_rent'=>$properties_for_rent,
      'properties_expired'=>$properties_expired]);
    }
}
