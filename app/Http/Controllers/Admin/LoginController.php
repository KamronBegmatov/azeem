<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('layout/default');
    }

    public function login()
    {
        return view('login');
    }

    public function loginAttempt()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (!$this->middleware('admin')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        session(['token' => $token]);
        // don't forget to check with middleware checkIfAdmin

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->flush();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
