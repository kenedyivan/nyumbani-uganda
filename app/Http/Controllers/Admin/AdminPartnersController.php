<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\RPartner;

class AdminPartnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function getAllPartners(){

        $partners = RPartner::all();

        return view('admin.admin_partners_listing')->with('partners',$partners);
    }

    public function showNewPartnersForm(){
        return view('admin.admin_new_partner');
    }

    public function saveNewPartner(Request $request){

        $partner = new RPartner();

        $partner->name = $request->input('name');
        $partner->website = $request->input('website');
        $partner->active = $request->input('active');

        if($request->hasFile('photo')){
            $photoName = $request->input('name').'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $partner->logo = $photoName;

                $partner->save();

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

                return redirect(route('admin.partners.listings'));



            }else{
                return "file error";
            }
        }else{
            return "No image picked";
        }
    }

    function edit(Request $request, $id){
      $partner = RPartner::find($id);

      return view('admin.admin_edit_partner')->with('partner',$partner);
    }

    function saveEdit(Request $request){

      $partner = RPartner::find($request->input('id'));

      $name = $request->input('name');
      $website = $request->input('website');

        if($name != ""){
              $partner->name = $name;
          }
        if($website != ""){
              $partner->website = $website;
        }

        if($request->hasFile('photo')){
            $photoName = $name.'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $partner->logo = $photoName;

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

        }

      }

        if($partner->save()){
          flash('Changes saved successfully')->success();
          return redirect()->route('admin.partners.edit.form',['id'=>$partner->id]);
        }else{
            flash('Failed saving changes')->error();
            return redirect()->route('admin.partners.edit.form',['id'=>$partner->id]);
        }

    }

    function delete(Request $request, $id){

      $partner = RPartner::find($id);
      return view('admin.admin_delete_partner')->with('partner',$partner);
    }

    function destroy(Request $request){
      $id = $request->input('id');

      if(RPartner::destroy($id)){
        flash('Partner deleted successfully')->success();
        return redirect()->route('admin.partners.listings');
      }else{
        flash('Failed deleting partner')->error();
        return redirect()->route('admin.partners.listings');
      }

    }

    function resizePostImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

        $image_path = $path;

          Image::make($image_path)
              ->resize(150, 60)
              ->save(public_path().'/images/partners/'.$image_name);

    }
}
