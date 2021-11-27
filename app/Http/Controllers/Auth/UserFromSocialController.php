<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserFromSocial;
use Laravel\Socialite\Facades\Socialite;

class UserFromSocialController extends Controller
{

    public function redirectGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return response()->json('Sorry, exception is thrown');
        }
        // only allow people with @company.com to login
        /*        if(explode("@", $user->email)[1] !== 'company.com'){
                    return redirect()->to('/');
                }*/
        // check if they're an existing user
        $existingUser = UserFromSocial::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new UserFromSocial;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        //return redirect()->to('/home');
        return response()->json('Success!');
    }
}
