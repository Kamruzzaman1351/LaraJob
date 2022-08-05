<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() {
        return view('user.login');
    }
    public function register() {
        return view('user.register');
    }

    public function store(Request $request) {
        $formData = $this->validate($request, [
            'name' => 'required|min:3 | max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('message', 'Registration Complete');

    }

    public function authenticate(Request $request) {
        $userData = $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required',
        ]);

        if(auth()->attempt($userData)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', "You are now login");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You are logout now');
    }
}
