<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Mail\PropertyActivated;
use Illuminate\Support\Facades\Mail;

class AdminPropertyForApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    function getAllProperties(){
        $properties = Property::where('active',0)->orderBy('created_at','DESC')->get();
        return view('admin.property_for_approval')->with('properties',$properties);
    }

    function save(Request $request){

        $property = Property::find($request->input('id'));


        if($request->input('select') == 1){
            $property->active = 1;
            if($property->package->id == 4){
                $property->banner = 1;
            }
            $property->last_activated_date = date('Y-m-d H:i:s');

            $datetime = $datetime = new DateTime(date('Y-m-d H:i:s'));
            $datetime->modify('+'.$property->package->days.' day');

            $property->expiry_date = $datetime;

            $property->expired = 0;

            $property->increment('initialize_count');
            if($property->save()){
                /*Mail::to($property->agent->email)
                    ->send(new PropertyActivated($property));*/
                flash('Property activated successfully')->success();
                return redirect()->route('admin.property.approval');
            }else{
                flash('Failed activating property')->error();
                return redirect()->route('admin.property.approval');
            }
        }
    }

}
