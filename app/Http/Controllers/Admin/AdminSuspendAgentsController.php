<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;

class AdminSuspendAgentsController extends Controller
{
        function suspendAgent(){
          $res = array();
          $message = "";
          $error = "";
          $status = "";

          $agent_id = $_GET['agent_id'];

          $state = $_GET['state'];

          if($state == 1){
            $agent = Agent::find($agent_id);

            $agent->suspended = 1;

            $agent->save();

            $error = 0;
            $status = 1;
            $message = "Agent suspended";
          }elseif($state == 0){
            $agent = Agent::find($agent_id);

            $agent->suspended = 0;

            $agent->save();

            $error = 0;
            $status = 2;
            $message = "Agent unsuspended";
          }else{
            $error = 0;
            $status = 3;
            $message = "Suspension state unknown";
          }

            $res['error'] = $error;
            $res['status'] = $status;
            $res['message'] = $message;

            return json_encode($res);
        }

        function getSuspendedAgents(){

          $agents = Agent::where('suspended',1)->get();

          $res = array();

          $agent_array = array();
          foreach ($agents as $agent) {
            array_push($agent_array,$agent->id);
          }

          $res["suspended"] = $agent_array;
          return json_encode($res);

        }
}
