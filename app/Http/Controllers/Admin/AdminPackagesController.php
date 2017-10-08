<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;

class AdminPackagesController extends Controller
{
    function getPackages(){
      $packages = Package::all();
      return view('admin.admin_packages_listing')
      ->with('packages',$packages);
    }

    function edit($id){
      $package = Package::find($id);
      return view('admin.admin_edit_package')
      ->with('package',$package);
    }

    function update(Request $request){
      $package = Package::find($request->input('id'));

      $title = $request->input('title');
      $price = $request->input('price');
      $listings = $request->input('listings');

      $slider = $request->input('slider');
      if($slider !=""){
        $slider = 1;
      }else{
        $slider = 0;
      }

      $feature = $request->input('feature');
      if($feature !=""){
        $feature = 1;
      }else{
        $feature = 0;
      }

      $recommended = $request->input('recommended');
      if($recommended !=""){
        $recommended = 1;
      }else{
        $recommended = 0;
      }

      $best = $request->input('best');
      if($best !=""){
        $best = 1;
      }else{
        $best = 0;
      }

      $partner = $request->input('partner');
      if($partner !=""){
        $partner = 1;
      }else{
        $partner = 0;
      }

      if($title != "")
        $package->title = $title;

      if($price != "")
        $package->price = $price;

      if($listings !="")
        $package->featured_listings = $listings;

      $package->slider = $slider;
      $package->feature = $feature;
      $package->recommended = $recommended;
      $package->best_value = $best;
      $package->partner = $partner;

      if($package->save()){
        flash('Changes saved successfully')->success();
        return redirect()->route('admin.packages.listing');
      }else{
        flash('Failed saving changes')->error();
        return redirect()->route('admin.packages.edit');
      }


    }
}
