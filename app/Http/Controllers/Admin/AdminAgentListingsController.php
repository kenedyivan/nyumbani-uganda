<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;

class AdminAgentListingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function getAllAgents(Request $request){
        $agents = Agent::all();
        return view('admin.agent_listings')->with('agents',$agents);
    }
}
