<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;
use App\User;

class AuthController extends Controller
{
    //
    protected $redirectPath = '/';

/**
 * Redirect the user to the Facebook authentication page.
 *
 * @return Response
 */
public function redirectToProvider()
{
    return Socialite::driver('facebook')->redirect();
}

/**
 * Obtain the user information from Facebook.
 *
 * @return Response
 */
public function handleProviderCallback()
{
    try {
        $user = Socialite::driver('facebook')->user();
    } catch (Exception $e) {
        return redirect('auth/facebook');
    }

    $authUser = $this->findOrCreateUser($user);

    Auth::login($authUser, true);

    return redirect()->route('user.home');
}

/**
 * Return user if exists; create and return if doesn't
 *
 * @param $facebookUser
 * @return User
 */
private function findOrCreateUser($facebookUser)
{
    $authUser = User::where('facebook_id', $facebookUser->id)->first();

    if ($authUser){
        return $authUser;
    }

    return User::create([
        'name' => $facebookUser->name,
        'email' => $facebookUser->email,
        'facebook_id' => $facebookUser->id,
        'avatar' => $facebookUser->avatar
    ]);
}
}
