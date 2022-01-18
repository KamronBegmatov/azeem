<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
        public function login(array $outerCredentials = [])
        {
            if (!empty($outerCredentials)){
                if (! $token = auth()->attempt($outerCredentials)) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
                return $this->respondWithToken($token);
            }
            $credentials = request(['email', 'password']);
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            // don't forget to check with middleware checkIfAdmin
            $_SESSION['token'] = $this->respondWithToken($token);
            return redirect()->route('dashboard');
        }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
