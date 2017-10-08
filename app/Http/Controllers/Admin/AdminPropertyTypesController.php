<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\PropertyType;

class AdminPropertyTypesController extends Controller
{
    function getPropertyTypes(){
        $types = PropertyType::all();

        return view('admin.admin_property_types_listing')
        ->with('types',$types);
    }

    function addPropertyType(){
      $types = PropertyType::all();
      $p = array(1,2,3,4);
      if($types->count()>0){
        foreach ($types as $type) {

          if (in_array($type->position, $p))
          {
              unset($p[array_search($type->position,$p)]);
          }

        }
      }

      return view('admin.admin_new_type')->with('positions',$p);
    }

    function savePropertyType(Request $request){

      $name = $request->input('type');
      $position = $request->input('position');

      $type = new PropertyType();

      $type->name = $name;

      $type->position = $position;

      if($request->hasFile('photo')){
          $photoName = $name.'.'.$request->photo->extension();

          $photoName = str_replace(' ', '_', $photoName);

          if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

              $type->image = $photoName;

              $type->save();

              $path = public_path().'/cache_uploads/'.$photoName;

              $this->resizePostImage($path,$photoName);

              flash('Type added successfully')->success();

              return redirect()->route('admin.property.types.list');

          }else{
            flash('Failed adding type')->error();

            return redirect()->route('admin.property.types.list');
          }
      }else{
          return "No image picked";
      }

    }

    function editPropertyType(Request $request, $id){
      $t= PropertyType::find($id);
      $types = PropertyType::all();
      $p = array(1,2,3,4);
      if($types->count()>0){
        foreach ($types as $type) {

          if (in_array($type->position, $p))
          {
              unset($p[array_search($type->position,$p)]);
          }

        }
      }

      //dd($p);
      return view('admin.admin_edit_type')
      ->with('type',$t)
      ->with('positions',$p);
    }

    function saveEdit(Request $request){

      $name = $request->input('name');
      $position = $request->input('position');


      $type = PropertyType::find($request->input('id'));

      if($name != ""){
            $type->name = $name;
        }

      if($position != ""){
        $type->position = $position;
      }

        if($request->hasFile('photo')){
            $photoName = $name.'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $type->image = $photoName;

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

        }

      }

      if($type->save()){
        flash('Changes saved successfully')->success();
        return redirect()->route('admin.property.type.edit.form',['id'=>$type->id]);
      }else{
          flash('Failed saving changes')->error();
          return redirect()->route('admin.property.type.edit.form',['id'=>$type->id]);
      }

    }

    function deletePropertyType(Request $request, $id){
        $type = PropertyType::find($id);
        return view('admin.admin_delete_type')->with('type',$type);
    }

    function destroy(Request $request){
      if(PropertyType::destroy($request->input('id'))){
        flash('Type deleted successfully')->success();
        return redirect()->route('admin.property.types.list');
      }else{
        flash('Failed deleting type')->error();
        return redirect()->route('admin.property.types.list');
      }
    }

    function resizePostImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

        $image_path = $path;

        Image::make($image_path)
            ->resize(100, 100)
            ->save(public_path().'/images/types/'.$image_name);
    }
}
