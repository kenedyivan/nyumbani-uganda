<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Property;
use App\Review;
use App\Comment;
use App\PropertyType;
use Input, Auth;

class ListingsController extends Controller
{
    function getAll(Request $request){
        $properties = Property::where('active', 1)->orderBy('id','DESC')->paginate(5);
        return view('users.property_listings')->with(['properties'=>$properties,'t'=>'all']);
    }

    function getForSale(){
        $properties = Property::where('for_sale',1)->where('active', 1)->orderBy('id','DESC')->paginate(5);
        return view('users.property_listings')->with(['properties'=>$properties,'t'=>'sale']);
    }

    function getForRent(){
        $properties = Property::where('for_rent',1)->where('active', 1)->orderBy('id','DESC')->paginate(5);
        return view('users.property_listings')->with(['properties'=>$properties,'t'=>'rent']);
    }


    function getPropertyDetails(Request $request, $id){
        $property = Property::find($id);
        $property->increment('views');
        return view('users.property_details')->with('property',$property);
    }

    function categoryProperty(Request $request, $id){
      $properties = Property::where('property_type_id',$id)->where('active', 1)->orderBy('id','DESC')->paginate(5);
      $type = PropertyType::find($id);
      return view('users.categories')->with(['properties'=>$properties,'t'=>'all','type'=>$type]);
    }

    function propertyReview(){
        $review = new Review();
        $property_rating = Property::find(Input::get('property_id'));
        $review->property_id  = Input::get('property_id');
        $review->rating  = Input::get('rating');
        $review->review  = Input::get('review');
        if(Auth::guard('agent')->check()){
        $review->user_id  = Auth::guard('agent')->id();

        $id = Input::get('property_id');

        if($review->save()){

            $rate = Review::where('property_id',Input::get('property_id'))->get();
            $i = 0;
            $j = 0;
            $r = sizeof($rate);
            foreach ($rate as $rates){
                while ($i<$r){
                    $j=$j+$rate[$i]['rating']; $i++;
                }
            }
            if($j>0){
                $av = round($j/$r);
                $property_rating->rating = round($j/$r);
            }else{
                $property_rating->rating = 0;
            }

            //return $av;
            if($property_rating->save())
            flash('Your review and rating was added successfully')->success();
            return redirect(route('property.detail',['id'=>$id]));
          }
        }else{
          flash('Please Login before adding review')->success();
        return redirect(route('agent.login.form'));
        }
    }
}
