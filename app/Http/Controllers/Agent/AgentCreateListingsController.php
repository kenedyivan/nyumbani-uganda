<?php

namespace App\Http\Controllers\Agent;

use App\Feature;
use App\Package;
use App\Property;
use App\PropertyImage;
use App\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Input;

class AgentCreateListingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('create-listing');
    }
    function showNewPropertyForm(Request $request){
        $features = Feature::all();
        $types = PropertyType::all();
        return view('agents.add_new_property')
            ->with(['types'=>$types,'features'=>$features])
            ->with('property_type',$this->property_types);
    }

    function editPropertyForm(Request $request, $id){
        $features = Feature::all();
        $types = PropertyType::all();
        $property = Property::find($id);
        return view('agents.edit_property')
            ->with(['types'=>$types,'features'=>$features,'property'=>$property])
            ->with('property_type',$this->property_types);
    }

    function createListing(Request $request){

        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 600);

        $title = $request->input('title');
        $description = $request->input('description');
        $type = $request->input('type');
        $sale_type = $request->input('sale_type');
        $price = $request->input('price');
        $currency = $request->input('currency');
        $address = $request->input('address');
        $district = $request->input('district');
        $town = $request->input('town');
        $region = $request->input('region');
        $country = $request->input('country');
        $area_size = $request->input('area_size');
        $size_prefix = $request->input('size_prefix');
        $bedrooms = $request->input('bedrooms');
        $bathrooms = $request->input('bathrooms');
        $garage = $request->input('garage');
        $year_built = $request->input('year_built');
        $last_remodel_year = $request->input('last_remodel_year');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');


        $property = array();

        $property['title'] = $title;
        $property['description'] = $description;
        $property['property_type_id'] = $type;
        $property['sale_type'] = $sale_type;
        $property['price'] = $price;
        $property['currency'] = $currency;
        $property['address'] = $address;
        $property['district'] = $district;
        $property['town'] = $town;
        $property['region'] = $region;
        $property['country'] = $country;
        $property['area_size'] = $area_size;
        $property['size_prefix'] = $size_prefix;
        $property['bedrooms'] = $bedrooms;
        $property['bathrooms'] = $bathrooms;
        $property['garage'] = $garage;
        $property['year_built'] = $year_built;
        $property['last_remodel_year'] = $last_remodel_year;
        $property['latitude'] = $latitude;
        $property['longitude'] = $longitude;


        Session::put('property',$property);

        $success = 1;

        $resp['success'] = $success;
        $resp['data'] = json_encode($property);

        return json_encode($resp);


    }

    function editListing(Request $request ){
        $id = Input::get('idproperty');
        $features = Feature::all();
        $types = PropertyType::all();
        $property = Property::find($id);

        if(Input::has('title')) $property->title = Input::get('title');
        if(Input::has('description')) $property->description = Input::get('description');
        if(Input::has('type')) $property->property_type_id = Input::get('type');
        if(Input::has('sale_type')) $sale_type = Input::get('sale_type');
        if(Input::has('price')) $property->price = Input::get('price');
        if(Input::has('currency')) $property->price_per_month = Input::get('currency');
        if(Input::has('address')) $property->address = Input::get('address');
        if(Input::has('district')) $property->district = Input::get('district');
        if(Input::has('town')) $property->town = Input::get('town');
        if(Input::has('region')) $property->region = Input::get('region');
        if(Input::has('country')) $property->country = Input::get('country');
        if(Input::has('area_size')) $property->area_size = Input::get('area_size');
        if(Input::has('size_prefix')) $property->size_prefix = Input::get('size_prefix');
        if(Input::has('bedrooms')) $property->bedrooms = Input::get('bedrooms');
        if(Input::has('bathrooms')) $property->bathrooms = Input::get('bathrooms');
        if(Input::has('garage')) $property->garage = Input::get('garage');
        if(Input::has('year_built')) $property->year_built = Input::get('year_built');
        if(Input::has('last_remodel_year')) $property->last_remodel_year = Input::get('last_remodel_year');

        if($sale_type == 'for_sale'){
            $property->for_sale = 1;
        }else{
            $property->for_sale = 0;
        }

        if($sale_type == 'for_rent'){
            $property->for_rent = 1;
        }else{
            $property->for_rent = 0;
        }


        if($property->save()){

            flash('Update was successfully done.')->success();
            return redirect(route('agent.profile'));
        }else{
            flash('Update was not successfully.')->success();
            return view('agents.agent_properties')->with(['types'=>$types,'features'=>$features,'property'=>$property]);
        }


    }

    function showSelectPackage(Request $request){
        $prop = Session::get('property');
        //$prop['image_name'] ='image name';
        //dd($prop);
        $packages = Package::all();
        return view('agents.agent_select_package')->with('packages',$packages);
    }

    function addPackage(Request $request){
        Session::put('package',$request->input('package_id'));
        return redirect(route('agent.create.listing'));
    }

    function showPaymentForm(Request $request){
        //return Session::get('property');
        $package = Session::get('package');
        return view('agents.agent_make_payment')->with('package',$package);;
    }

    function addPayment(Request $request){

        $s_prop = Session::get('property');

        //dd($s_prop);

        $property = new Property();


        $property->title = $s_prop['title'];
        $property->description = $s_prop['description'];
        $property->agent_id = Auth::guard('agent')->id();
        $property->property_type_id = $s_prop['property_type_id'];
        $property->package_id = Session::get('package');
        $property->status = 0;
        if(Session::get('package')==4){
            $property->of_value = 1;
        }else{
            $property->of_value = 0;
        }


        if($s_prop['sale_type'] == 'for_sale'){
            $property->for_sale = 1;
        }else{
            $property->for_sale = 0;
        }

        if($s_prop['sale_type'] == 'for_rent'){
            $property->for_rent = 1;
        }else{
            $property->for_rent = 0;
        }


        $property->price = $s_prop['price'];
        $property->currency = $s_prop['currency'];

        $r_pid = substr( md5(rand()), 0, 9);
        $r_pid = 'prod'.$r_pid;
        $property->propertyID = $r_pid;

        $property->address = $s_prop['address'];
        $property->district = $s_prop['district'];
        $property->town = $s_prop['town'];
        $property->region = $s_prop['region'];
        $property->country = "uganda";


        $property->area_size = $s_prop['area_size'];
        $property->size_prefix = $s_prop['size_prefix'];
        $property->bedrooms = $s_prop['bedrooms'];
        $property->bathrooms = $s_prop['bathrooms'];
        $property->garage = $s_prop['garage'];
        $property->year_built = $s_prop['year_built'];
        $property->last_remodel_year = $s_prop['last_remodel_year'];
        $property->latitude = $s_prop['latitude'];
        $property->longitude = $s_prop['longitude'];

        $property->image = "no-image";

        if($property->save()){

            $cur_property = Property::find($property->id);

            $images = Session::get('property_photos');

            foreach ($images as $image){

                $this->resize_image(public_path().'/cache_uploads/'.$image,$image);

                $property_image = new PropertyImage(['image'=>$image]);

                $cur_property->images()->save($property_image);

                //execute to set main property image
                if($cur_property->image == 'no-image'){
                    $cur_property->image = $image;
                    $cur_property->save();
                }

                //sleep(1);

            }

            flash('Property listing added successfully')->success();
            return view('agents.agent_done_adding_package');

        }else{
            flash('Error adding property')->success();
            return redirect(route('agent.create.listing'));
        }

        $image_name = $s_prop['image'];

        $property->image = $image_name;

        if($property->save()){

            $path = public_path().'/cache_uploads/'.$image_name;

            $this->resize_image($path,$image_name);


            flash('Property listing added successfully')->success();
            return view('agents.agent_done_adding_package');

        }else{
            flash('Error adding property')->success();
            return redirect(route('agent.create.listing'));
        }




    }

    function deleteProperty($id){
        $agent = Auth::guard('agent')->id();
        Property::find($id)->delete();
        return redirect(route('agent.properties',['agentId' => $agent]));
    }

    function resize_image($image,$photoName)
    {
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', 600);

        $image_path = $image;

        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path() . '/images/properties/bottom_slider_99x99/'.$photoName);

        Image::make($image_path)
            ->resize(370, 202)
            ->save(public_path() . '/images/properties/featured_slider_370x202/'.$photoName);

        Image::make($image_path)
            ->resize(355, 240)
            ->save(public_path() . '/images/properties/latest_home_and_best_property_355x240/'.$photoName);

        Image::make($image_path)
            ->resize(50, 50)
            ->save(public_path() . '/images/properties/latest_reviews_50x50/'.$photoName);

        Image::make($image_path)
            ->resize(100, 75)
            ->save(public_path() . '/images/properties/others_100x75/'.$photoName);

        Image::make($image_path)
            ->resize(370, 370)
            ->save(public_path() . '/images/properties/our_location_370x370/'.$photoName);

        Image::make($image_path)
            ->resize(770, 370)
            ->save(public_path() . '/images/properties/our_location_770x370/'.$photoName);

        Image::make($image_path)
            ->resize(2000, 440)
            ->save(public_path() . '/images/properties/parallax_banner_2000x1440/'.$photoName);

        Image::make($image_path)
            ->resize(364, 244)
            ->save(public_path() . '/images/properties/property_listing_364x244/'.$photoName);

        Image::make($image_path)
            ->resize(1170, 600)
            ->save(public_path() . '/images/properties/single_property_1170x600/'.$photoName);

        Image::make($image_path)
            ->resize(1423, 603)
            ->save(public_path() . '/images/properties/banner_1423x603/'.$photoName);

        Image::make($image_path)
            ->resize(150, 110)
            ->save(public_path() . '/images/properties/agent_properties_150x110/'.$photoName);

        Image::make($image_path)
            ->resize(120, 120)
            ->save(public_path() . '/images/properties/agent_properties_120x120/'.$photoName);


        /*if (File::exists($image_path))
        {
            echo "Yup. It exists.";
        }*/

        /*if (!unlink($image_path))
        {
            echo ("Error deleting image_path");
        }
        else
        {
            echo ("Deleted image_path");
        }*/
    }

    function cl(Request $request){



        /*$images = $_POST["file"];

        $array=json_decode($images);

        foreach ($array as $image){

            $data = $image;
            $pos  = strpos($data, ';');
            $type = explode(':', substr($data, 0, $pos))[1];

            $extension = explode('/',$type);

            $ext = $extension[1];

            $random = substr( md5(rand()), 0, 7);

            $cache_image = file_get_contents($image);

            file_put_contents(public_path().'/uploads/ajax/'.$random.'.'.$ext, $cache_image);

            sleep(5);

        }*/

        $title = $request->input('title');


        $resp['resp'] = $title;

        return json_encode($resp);

    }

    public function multi_upload_form(){
        return view('agents.add_multi_images');
    }

    public function upld(Request $request){
        $tempFile = $_FILES['photo']['tmp_name'];
        $res = array();
        $res["tempFile"] = $tempFile;
        //echo json_encode($resp);



        if (!empty($_FILES)) {

            $file_names = array();
            $i = 0;

    	    $tempFile = $_FILES['photo']['tmp_name'];

    	    foreach($tempFile as $key => $tmp_name)
    			{
    			    $file_name = $key.$_FILES['photo']['name'][$key];
    			    $file_size =$_FILES['photo']['size'][$key];
    			    $file_tmp =$_FILES['photo']['tmp_name'][$key];
    			    $file_type=$_FILES['photo']['type'][$key];

    			    $formatted_name = time().$file_name;

    			    $file_names[$i] = $formatted_name;

    			    move_uploaded_file($file_tmp,public_path().'/cache_uploads/'.$formatted_name);

    			    $i++;
    			}

            Session::put('property_photos',$file_names);

    	    $res['files'] = $file_names;

    	    echo json_encode($res);       //3

    	}
    }
    public function post_upload(){

        $input = Input::all();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        $file = Input::file('file');

        $extension = File::extension($file['name']);
        $directory = path('public').'uploads/'.sha1(time());
        $filename = sha1(time().time()).".{$extension}";

        $upload_success = Input::upload('file', $directory, $filename);

        if( $upload_success ) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }


}
