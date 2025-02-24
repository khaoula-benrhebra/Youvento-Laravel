<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = Member::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); 
            
            
            if ($user->role->name === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role->name === 'student') {
                return redirect()->route('student.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
