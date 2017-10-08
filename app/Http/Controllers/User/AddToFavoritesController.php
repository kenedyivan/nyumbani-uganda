<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;
use App\Property;

class AddToFavoritesController extends Controller
{
    function addToFavorites(){

      $res = array();
      $message = "";
      $error = "";
      $status = "";

      $property_id = $_GET['property_id'];
      $agent_id = $_GET['agent_id'];

      if($agent_id == 0){
        $error = 1;
        $status = 3;
        $message = "Login to add to favorites";

      }else{

        $favorite = Agent::find($agent_id)->agent_favorites()
        ->where('property_id',$property_id)
        ->get();

        if($favorite->count()>0){
          return $this->removeFavorite($property_id,$agent_id);
        }else{
          $agent = Agent::find($agent_id);

          $agent->agent_favorites()->attach($property_id);
          $error = 0;
          $status = 1;
          $message = "Added to favorites";


        }

        $res['error'] = $error;
        $res['status'] = $status;
        $res['message'] = $message;

        return json_encode($res);

      }

    }

    function removeFavorite($p_id,$a_id){
      $res = array();
      $message = "";
      $error;

      $property_id = $p_id;
      $agent_id = $a_id;

      $agent = Agent::find($agent_id);

      $agent->agent_favorites()->detach($property_id);
      $error = 0;
      $status = 2;
      $message = "Removed from favorites";


      $res['error'] = $error;
      $res['status'] = $status;
      $res['message'] = $message;

      return json_encode($res);
    }

    function getFavorites(){

      $agent_id = $_GET['agent_id'];

      $favorites = Agent::find($agent_id)->agent_favorites;

      $res = array();

      $fav_array = array();
      foreach ($favorites as $favorite) {
        array_push($fav_array,$favorite->id);
      }

      $res["favorites"] = $fav_array;
      return json_encode($res);
    }

    function getAgentFavourites($agent_id){
        $favorites = Agent::find($agent_id)->agent_favorites()->paginate(5);
        return view('users.myfavourites')->with(['properties'=>$favorites,'title'=>'myfavourites','t'=>'favourites']);
    }
}
