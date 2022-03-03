<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $admin = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
        ];

        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
        ];

        if (Auth::attempt($admin)){
            return redirect()->route('competitions.index');
        } elseif (Auth::attempt($user)){
            return redirect()->route('user.dashboard');
        }
        
        // $credentials = $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required'
        // ]);

        // if(Auth::attempt($credentials))
        // {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // }
        
        return back()->with('loginError', 'Login Failed !');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect('/');
    }
}
