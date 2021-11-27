<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendResetLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function resetPassword (Request $request){
        if(!$this->validEmail($request->email)) {
            return response()->json([
                'message' => 'Email not found.'
            ], Response::HTTP_NOT_FOUND);
        } else {
            $this->sendEmail($request->email);
            return response()->json([
                'message' => 'Password reset mail has been sent.'
            ], Response::HTTP_OK);
        }
    }

    public function sendEmail($email){
        $token = $this->createToken($email);
        Mail::to($email)->send(new SendResetLink($token));
    }

    public function validEmail($email) {
        return !!User::where('email', $email)->first();
    }

    public function createToken($email){
        $isToken = DB::table('password_resets')->where('email', $email)->first();
        if($isToken) {
            return $isToken->token;
        }
        $token = Str::random(80);;
        $this->saveToken($token, $email);
        return $token;
    }

    public function saveToken($token, $email){
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }
}
