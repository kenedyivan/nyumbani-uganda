<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AdminRegistrationController extends Controller
{
    function showRegistrationForm(Request $request){
        return view('admin.admin_create_new_user_form');
    }
    
    function saveUser(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('role');
        
        
        $admin = new Admin();
        
        $admin->firstname = $firstname;
        $admin->lastname = $lastname;
        $admin->username = $username;
        $admin->email = $email;
        $admin->password = bcrypt($password);
        $admin->role = $role;
        
        if($admin->save()){
            flash('User created successfully')->success();
            return redirect()->route('admin.user.list');
        }
    }
   
}
