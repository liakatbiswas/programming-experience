<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // $credientials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)) {
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Email & Password is incorrect!');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
