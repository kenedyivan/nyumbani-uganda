<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Agent;

class AgentProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent');
    }

    function showAgentProfile(Request $request){

        $auth_agent_id = Auth::guard('agent')->id();

        $agent = Agent::find($auth_agent_id);

        return view('agents.agent_profile')
        ->with('agent',$agent)
        ->with('property_type',$this->property_types)
        ->with('t','agent');
    }


}
