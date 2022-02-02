<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserFromSocial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        if ($existingUser) {
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser = new UserFromSocial;
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->avatar = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        //return redirect()->to('/home');
        return response()->json('Success!');
    }

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $saveUser = UserFromSocial::updateOrCreate([
                'facebook_id' => $user->getId(),
            ], [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make($user->getName() . '@' . $user->getId())
            ]);

            Auth::loginUsingId($saveUser->id);

            return response()->json('Success!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function redirectTwitter(){
        return Socialite::driver('twitter')->redirect();
    }

    public function callbackFromTwitter ()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $userWhere = UserFromSocial::where('twitter_id', $user->id)->first();
            if($userWhere){
                /*$credentials = [
                    'email' => $userWhere->email,
                    'password' => $userWhere->password,
                ];*/
                $credentials = array("email"=>$userWhere->email, "password"=>$userWhere->password);
                (new AuthController)->login($credentials);
            }else{
                $twitterUser = UserFromSocial::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id'=> $user->id,
                    'password' => bcrypt('F5fBGe3k^o@Hau^#RnJi&3N9wuxAC5s!')
                ]);
                $credentials = array("email"=>$twitterUser->email, "password"=>$twitterUser->password);
                    (new AuthController)->login($credentials);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}

//  produmay logiku password i Return success
