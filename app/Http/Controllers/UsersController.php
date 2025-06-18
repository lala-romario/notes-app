<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $users = User::all();

        return view('users.users', ['users' => $users]);
    }

    public function create()
    {
        return view('users.signup');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|min:10',
            'password' => 'required|min:12'
        ]);

        User::create($credentials);

        $request->session()->regenerate();

        return redirect('dashboard');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|min:10',
            'password' => 'required|min:12'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();

            return view('components.dashboard', ['username' => $user->name]);


            
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
