<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showProfile() {
        $userName = Auth::user()->name;
        return view('home', compact('userName'));
    }

    public function index() {
        $data = User::all();
        return view('home', compact('data'));
    }

    public function login(Request $request): RedirectResponse {
        $credentials = $request->validate([
           'email' => 'Required|email',
           'password' => 'Required' 
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'name' => 'Required|string|max:100',
            'email' => 'Required|email',
            'password' => 'Required'
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        $user = User::create($credentials);

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'error' => 'Registration failed',
        ]);
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
