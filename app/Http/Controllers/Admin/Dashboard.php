<?php

namespace App\Http\Controllers\Admin;

use App\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard extends Controller{


    public function index(Request $request){

        return view('admin.dashboard');

    }

    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => 'logout']);
    }


}