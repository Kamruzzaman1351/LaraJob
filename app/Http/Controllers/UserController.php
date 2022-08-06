<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $mailInfo = [
            'name' => $user->name,
            'title' => 'Thank for signup with Laravel Job Website',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'user' => 'Kamruzzaman',
        ];
        Mail::to($user->email)->send(new WelcomeEmail($mailInfo));
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
