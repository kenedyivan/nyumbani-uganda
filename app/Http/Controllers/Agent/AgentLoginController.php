<?php

namespace App\Http\Controllers\Agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Input, Redirect;
use App\Agent;

class AgentLoginController extends Controller
{
    use AuthenticatesUsers;

    function showLoginForm(Request $request){
        return view('agents.login_form')
        ->with('property_type',$this->property_types);
    }

    protected $redirectTo = '/agent/profile';


    protected function guard()
    {
        return Auth::guard('agent');
    }

    public function login(Request $request){

        $email = $request->input('email');

        $password = $request->input('password');


        if ($this->guard()->attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            if(basename(Session::get('redirect_to_create_listing')) == 'add-new-property'){
                return redirect()->intended(route('agent.create.listing'));
            }else if(($this->guard()->user()->user_type)==0){
              flash('User Login successfully')->success();
                return redirect()->intended(route('user.home'));
            }
            flash('Agent Login successfully')->success();
            return redirect()->intended(route('agent.profile'));
        }

        /*
         * //return redirect()->back();
        //return URL::full();
        //return basename(request()->path());
        */

        return $this->sendFailedLoginResponse($request);




    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('Invalid Username or Password')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();
        flash('Logout successfully')->success();
        return redirect(route('agent.login.form'));

    }


    public function showRegisterForm(Request $request){
        return view('agents.register')
        ->with('property_type',$this->property_types);
    }

    public function agent_details(Request $request){
        return view('agents.agent_details')
        ->with('property_type',$this->property_types);
    }

    public function register(Request $request){
        $user = new Agent();/*
        $rules = array(
        'first_name' => 'required|min:1',
        'last_name' => 'required|min:1',
        'email' => 'required|unique:agents',
        'password' => 'required|min:6'
      );

      $validator = Validator::make(Input::all(), $rules);
      if($validator->fails())
        return redirect(route('agent.register.form'))
          ->withInputs(Input::all())
          ->withErrors($validator->messages());*/

        if(Input::has('first_name')) $user->first_name = Input::get('first_name');
        if(Input::has('last_name')) $user->last_name = Input::get('last_name');
        if(Input::has('username')) $user->username = Input::get('username');
        if(Input::has('email')) $user->email = Input::get('email');
        if(Input::has('user_type')) $user->user_type = Input::get('user_type');
        if(Input::has('password')) $user->password = bcrypt(Input::get('password'));

        if( $request->hasFile('photo') ) {
            $imageName = $request->input('username').'.'.$request->photo->extension();

            $imageName = str_replace(' ', '_', $imageName);
            if($path = $request->photo->move(public_path().'/cache_uploads/', $imageName)){
                $user->profile_picture = $imageName;

        if($user->save() && Input::get('user_type')==0)
        {
            $path = public_path().'/cache_uploads/'.$imageName;

                $this->resizeProfileImage($path,$imageName);

            flash('Registration was successfully done. You can now login')->success();
            return redirect(route('agent.login.form'));
        }
        else if($user->save() && Input::get('user_type')==1)
        {

            $path = public_path().'/cache_uploads/'.$imageName;

                $this->resizeProfileImage($path,$imageName);

            $last = DB::table('agents')->orderBy('id', 'DESC')->first();
            $iduser = $last->id;
            flash('Registration was successfully done. Please provide more information below.')->success();
            return view('agents.agent_details')->with('iduser',$iduser);
            //return $iduser;
        }

        }else{
                return "file error";
            }
        }else{
            return "No image picked";
        }

    }

    public function agent_edit_submit(Request $request){

        $id = $this->guard()->user()->id;
        $agent = Agent::find($id);

        if(Input::has('first_name')) $agent->first_name = Input::get('first_name');
        if(Input::has('last_name')) $agent->last_name = Input::get('last_name');
        if(Input::has('email')) $agent->email = Input::get('email');
        if(Input::has('company')) $agent->company = Input::get('company');
        if(Input::has('bio')) $agent->bio = Input::get('bio');
        if(Input::has('facebook_link')) $agent->facebook_link = Input::get('facebook_link');
        if(Input::has('twitter_link')) $agent->twitter_link = Input::get('twitter_link');
        if(Input::has('linkedin_link')) $agent->linkedin_link = Input::get('linkedin_link');

        if( $request->hasFile('edit_photo') ) {

          $imageName = $request->input('username').'.'.$request->edit_photo->extension();

          $imageName = str_replace(' ', '_', $imageName);
          if($path = $request->edit_photo->move(public_path().'/cache_uploads/', $imageName)){
              $agent->profile_picture = $imageName;

              if($agent->save()){
                $path = public_path().'/cache_uploads/'.$imageName;

                    $this->resizeProfileImage($path,$imageName);

                  flash('Update was successfully done.')->success();
                  return redirect(route('agent.profile'));
              }
              else{
                flash('Un successfull Update')->success();
                return redirect(route('agent.profile'));
              }

        }else{
          if($agent->save()){
              flash('Update was successfully done.')->success();
              return redirect(route('agent.profile'));
          }
          else{
            flash('Un successfull Update')->success();
            return redirect(route('agent.profile'));
          }

        }
      }


    }

    public function agent_details_submit(Request $request){
        $id = Input::get('iduser');
        $agents = Agent::find($id);

        if(Input::has('company')) $agents->company = Input::get('company');
        if(Input::has('position')) $agents->position = Input::get('position');
        if(Input::has('bio')) $agents->bio = Input::get('bio');
        if(Input::has('office_phone')) $agents->office_phone = Input::get('office_phone');
        if(Input::has('mobile_phone')) $agents->mobile_phone = Input::get('mobile_phone');
        if(Input::has('fax')) $agents->fax = Input::get('fax');
        if(Input::has('facebook_link')) $agents->facebook_link = Input::get('facebook_link');
        if(Input::has('twitter_link')) $agents->twitter_link = Input::get('twitter_link');
        if(Input::has('linkedin_link')) $agents->linkedin_link = Input::get('linkedin_link');

        if($agents->save()){

            flash('Registration was successfully done. You can now login')->success();
            return redirect(route('agent.login.form'));
        }
        else{
          flash('Registration was successfully done. You can now login')->success();
          return redirect(route('agent.register.form'));
        }
    }


    function agent_update_password (Request $request){
      $id = $this->guard()->user()->id;
      $hashedPassword = $this->guard()->user()->password;
      $agent = Agent::find($id);

      if (\Hash::check(Input::get('oldpass'), $hashedPassword)) {
    // The passwords match...
        if(Input::get('newpass') == Input::get('confirmpass')){

          if(Input::has('newpass')) $agent->password = bcrypt(Input::get('newpass'));
          if($agent->save()){
            flash('Password update was successfully done.')->success();
            return redirect(route('agent.profile'));
          }
        }else{
          flash('Un successfull Update, Password miss-match')->success();
          return redirect(route('agent.profile'));
        }
      }else{
        flash('Un successfull Update. Provide correct old password')->success();
        return redirect(route('agent.profile'));
      }

    }

    function resizeProfileImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

            $image_path = $path;

            Image::make($image_path)
                ->resize(239, 239)
                ->save(public_path().'/images/agents/all_agents_239x239/'.$image_name);

            Image::make($image_path)
                ->resize(74, 74)
                ->save(public_path().'/images/agents/contact_agent_74x74/'.$image_name);

            Image::make($image_path)
                ->resize(71, 71)
                ->save(public_path().'/images/agents/home_71x71/'.$image_name);

            Image::make($image_path)
                ->resize(330, 330)
                ->save(public_path().'/images/agents/profile_330x330/'.$image_name);
    }

}
