<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Organization;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login-select'); // Create a view to select org or admin login or redirect default
    }

    public function login(Request $request)
    {
        $request->validate([
            'role' => 'required|in:organization,admin',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $role = $request->input('role');
        $email = $request->input('email');
        $password = $request->input('password');

        if ($role === 'organization') {
            $user = Organization::where('email', $email)->first();
            if ($user && Hash::check($password, $user->password)) {
                session([
                    'user_id' => $user->id,
                    'user_role' => 'organization',
                    'user_name' => $user->name,
                ]);
                return redirect()->route('org.dashboard');
            }
        } elseif ($role === 'admin') {
            $user = Admin::where('email', $email)->first();
            if ($user && Hash::check($password, $user->password)) {
                session([
                    'user_id' => $user->id,
                    'user_role' => 'admin',
                    'user_name' => $user->name,
                ]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->with('error', 'Invalid credentials or role mismatch')->withInput();
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
