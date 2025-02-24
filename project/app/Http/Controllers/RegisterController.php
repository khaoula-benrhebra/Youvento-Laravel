<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\Student;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:members',
            'email' => 'required|email|unique:members',
            'password' => 'required|min:6',
            'student_nbr' => 'required|numeric|unique:students' 
        ]);

        
        $studentRole = Role::where('name', 'student')->first();

        if (!$studentRole) {
            return back()->withErrors(['role' => 'Le rôle étudiant n\'existe pas.']);
        }

       
        $member = Member::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $studentRole->id
        ]);

        
        Student::create([
            'member_id' => $member->id,
            'student_nbr' => (int)$request->student_nbr 
        ]);

        return redirect()->route('login')
                    ->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
    }
}