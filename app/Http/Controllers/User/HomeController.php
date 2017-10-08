<?php

namespace App\Http\Controllers\User;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Property;
use App\Banner;
use App\RPartner;
use Session;
use App\PropertyType;
use App\Post;

class HomeController extends Controller
{

    function index(Request $request){

        //$properties = Property::all();

        $banner_images = Property::where('banner',1)->where('suspended',0)->where('active', 1)->get();

        $properties_for_sale = Property::where('for_sale',1)->where('suspended',0)->where('active', 1)->orderBy('id','DESC')->get();

        $properties_for_rent = Property::where('for_rent',1)->where('suspended',0)->where('active', 1)->orderBy('id','DESC')->get();

        $properties_of_value = Property::where('of_value',1)->where('active', 1)->orderBy('id','DESC')->take(2)->get();

        $most_viewed = Property::orderBy('views','DESC')->where('active', 1)->orderBy('id','DESC')->take(4)->get();

        $home_agents = Agent::select(DB::raw('agents.id,
        agents.first_name as first_name,
        agents.last_name as last_name,
        agents.profile_picture as profile_picture,
        agents.company as company,
        agents.position as position,
        agents.bio as bio,
        COUNT(properties.id) as num_properties'))
                  ->leftJoin('properties', 'agents.id', '=', 'properties.agent_id')
                  ->groupBy('agents.id')
                  ->orderBy('num_properties', 'desc')
                  ->take(4)->get();

        $home_partners = RPartner::where('active', 1)->take(9)->get();

        $posts = Post::select(DB::raw('posts.id,
        posts.title as title,
        posts.body as body,
        posts.created_at as created_at,
        posts.image as image,
        posts.slug as slug,
        admins.id as admin_id,
        admins.username as username,
        COUNT(comments.id) as num_comments'))
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->join('admins', 'admins.id', '=', 'posts.admin_id')
                ->groupBy('posts.id')
                ->get();


          //dd($posts);


        $types = DB::table('property_types')->get();

        $type_pos1 = PropertyType::where('position',1)->first();
        $type_pos2 = PropertyType::where('position',2)->first();
        $type_pos3 = PropertyType::where('position',3)->first();
        $type_pos4 = PropertyType::where('position',4)->first();


        return view('users.index')->with([
            'banner_images'=>$banner_images,
            'partners'=>$home_partners,
            'posts'=>$posts,
            'properties_for_sale'=>$properties_for_sale,
            'properties_for_rent'=>$properties_for_rent,
            'properties_of_value'=>$properties_of_value,
            'home_agents'=>$home_agents,
            'property_type' => $this->property_types,
            'most_viewed' => $most_viewed,
            'type_pos1' => $type_pos1,
            'type_pos2' => $type_pos2,
            'type_pos3' => $type_pos3,
            'type_pos4' => $type_pos4
          ]);

          //return $this->property_types;

    }

    function privacy(){

        //$most_rated = Property::orderBy('rating','DESC')->take(3)->get();
        //return "Howdy";
        //dd(["properties"]);
        //$side_bar = Session::get('side_bar');
        //foreach ($most_rated as $p) {
          //echo $p->type;
        //}
        //dd($property->type);
        return view('users.privacy');

    }



    function contact(){
        return view('users.contact');
    }

    function about(){
        return view('users.about');
    }

    function personalsafety(){
        return view('users.personalsafety');
    }

    function disclaimer(){
        return view('users.disclaimer');
    }

    function termsofUse(){
        return view('users.termsAndConditions');
    }

    function getMoreImages(){

      $id = $_GET['property_id'];

      $images = Property::find($id)->images;

      $res['images'] = $images;
      return json_encode($res);

    }
}
