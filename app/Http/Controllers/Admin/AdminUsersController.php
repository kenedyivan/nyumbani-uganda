<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminUsersController extends Controller
{
	function showUser(Request $request,$id){

	    $user = Admin::find($id);

		return view('admin.admin_user_profile')->with('user',$user);

	}

	function getAllUsers(){
		$admins = Admin::all();
		return view('admin.admin_users_list')->with('admins',$admins);
	}

	function editUser($id){

	    $user = Admin::find($id);

	    return view('admin.admin_edit_user_form')->with('user',$user);
	}

	function save(Request $request){

	    $id = $request->input('id');
	    $user = Admin::find($id);

	    $firstname = $request->input('firstname');
	    $lastname = $request->input('lastname');
	    $username = $request->input('username');
	    $email = $request->input('email');
	    $new_pass = $request->input('new_password');
	    $repeat_pass  = $request->input('repeat_password');
	    $role = $request->input('role');

	    if($firstname != ""){
            $user->firstname = $firstname;
        }
        if($lastname != "")
            $user->lastname = $lastname;
        if($username != "")
            $user->username = $username;
        if($email != "")
            $user->email = $email;
        if($new_pass != "" && $repeat_pass != "" && ($new_pass != $repeat_pass)){
            flash('Passwords don\'t match')->warning();
            return view('admin.admin_edit_user_form')->with('user',$user);
        }else{
            $user->password = bcrypt($new_pass);
        }

        if($role != "")
            $user->role = $role;

        if($user->save()){
            flash('Changes saved successfully')->success();
        }else{
            flash('Save unsuccessful')->error();
        }

        return view('admin.admin_edit_user_form')->with('user',$user);

	}

	function delete(Request $request, $id){
				$admin = Admin::find($id);
				return view('admin.admin_users_delete')->with('admin',$admin);
  }

	function destroy(Request $request){

				$id = $request->input('id');

				if(Admin::destroy($id)){
					flash('User deleted successfully')->success();
					return redirect()->route('admin.user.list');
				}else{
					flash('Failed to delete user')->error();
					return redirect()->route('admin.user.list');
				}
	}

}
