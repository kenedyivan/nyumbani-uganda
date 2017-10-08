<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;

class AgentsController extends Controller
{
    function getAllAgents(Request $request){
        $agents = Agent::orderBy('id','DESC')->paginate(5);
        return view('users.property_agents')
        ->with('agents',$agents)
        ->with('property_type',$this->property_types);
    }

    function getAgentDetails(Request $request, $id){
        $agent = Agent::find($id);

        $properties = $agent->properties()->where('active', 1)->orderBy('id','DESC')->paginate(5);

        return view('users.agent_details')
        ->with(['agent'=>$agent,'t'=>'all',
        'properties'=>$properties])
        ->with('property_type',$this->property_types);
    }


    function getForSale(Request $request, $id){
        $agent = Agent::find($id);

        $properties = $agent->properties()->where('for_sale',1)->where('active', 1)->orderBy('id','DESC')->paginate(5);

        return view('users.agent_details')
        ->with(['agent'=>$agent,'t'=>'sale',
        'properties'=>$properties])
        ->with('property_type',$this->property_types);
    }

    function getForRent(Request $request, $id){
        $agent = Agent::find($id);

        $properties = $agent->properties()->where('for_rent',1)->where('active', 1)->orderBy('id','DESC')->paginate(5);

        return view('users.agent_details')
        ->with(['agent'=>$agent,'t'=>'rent',
        'properties'=>$properties])
        ->with('property_type',$this->property_types);
    }
}
