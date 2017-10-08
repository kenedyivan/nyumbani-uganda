<?php

namespace App\Http\Controllers\Agent;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Property;

class AgentPropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent');
    }

    function getAgentProperties(Request $request, $agentId){

        if($agentId != Auth::guard('agent')->id()){
            flash('Please Login before adding review')->success();
            return redirect(route('agent.login.form'));
        }else{
            $properties = Agent::find($agentId)->properties()->where('agent_id',$agentId)->where('active', 1)->orderBy('id','DESC')->paginate(4);
            $agent = Agent::find($agentId);
            return view('agents.agent_properties')->with(['agent'=>$agent,'t'=>'published','properties'=>$properties]);
        }

    }

    function getAgentSuspendedProperties(Request $request, $agentId){

        if($agentId != Auth::guard('agent')->id()){
          flash('Please Login before adding review')->success();
          return redirect(route('agent.login.form'));
        }else{
            $properties = Agent::find($agentId)->properties()->where('suspended',1)->where('active', 1)->orderBy('id','DESC')->paginate(5);
            $agent = Agent::find($agentId);
            return view('agents.agent_properties')->with(['agent'=>$agent,'t'=>'suspended','properties'=>$properties]);
        }

    }

    function getAgentExpiredProperties(Request $request, $agentId){

        if($agentId != Auth::guard('agent')->id()){
          flash('Please Login before adding review')->success();
          return redirect(route('agent.login.form'));
        }else{
            $properties = Agent::find($agentId)->properties()->where('expired',1)->where('active', 1)->orderBy('id','DESC')->paginate(5);
            $agent = Agent::find($agentId);
            return view('agents.agent_properties')->with(['agent'=>$agent,'t'=>'expired','properties'=>$properties]);
        }

    }
}
