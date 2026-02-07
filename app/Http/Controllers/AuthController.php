<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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

    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $role = Role::where('name', 'user')->first();

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'role_id' => $role ? $role->id : 0,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function destroy(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
