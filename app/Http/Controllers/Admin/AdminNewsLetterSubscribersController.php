<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NewsLetterSubscriber;

class AdminNewsLetterSubscribersController extends Controller
{
    function getSubscribers(){
      $subscribers = NewsLetterSubscriber::all();

      return view('admin.admin_subscribers_listings')
      ->with('subscribers',$subscribers);
    }
}
