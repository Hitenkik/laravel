<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $input = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($input)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'credentials not matched with our records.']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.admin');
    }

    public function dashboard()
    {
        // dd(Auth::id());
        // dd(Auth::user()->email);
        // dd(Auth::check());

        return view('dashboard');
    }
}
