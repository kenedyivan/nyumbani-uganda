<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Property;
use App\Mail\PropertyExpired;
use Illuminate\Support\Facades\Mail;

class AdminPropertyExpireController extends Controller
{
    function checkForExpiredProperties(){
        $cur_date_time = date("Y-m-d H:i:s");
        $properties = Property::where('expiry_date','<=',$cur_date_time)
            ->where('expired',0)
            ->get();
        return $properties;
    }

    function expireProperty(){
        $expired_properties = $this->checkForExpiredProperties();

        if($expired_properties->count()>0){
            foreach ($expired_properties as $property){
                //$ex_property = Property::find($property->id);
                $property->last_expiry_date = date("Y-m-d H:i:s");
                $property->expired = 1;
                $property->active = 0;

                Mail::to($property->agent->email)
                    ->send(new PropertyExpired($property));

                if($property->save()){
                    echo "Property: ".$property->title." has <strong>expired</strong>";
                }

            }
        }else{
            return "Found no expired properties yet";
        }
    }
}
