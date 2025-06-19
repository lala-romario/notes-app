<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|min:10',
            'password' => 'required|min:12'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('dashboard');
        }

        return redirect('login');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $request->session()->invalidate();

            Auth::logout();

            return redirect('/');
        }
    }
}
