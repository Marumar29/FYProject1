<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        return view('register-admin');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate input data
        $request->validate([
            'admin_name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // Create admin record
        $admin = Admin::create([
            'admin_name' => $request->admin_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Set session for the newly registered admin (log them in)
        session([
            'admin_id' => $admin->id,
            'admin_name' => $admin->admin_name,
            'user_type' => 'admin',    // keep this consistent with your middleware check
            'user_role' => 'admin',    // if you use RoleMiddleware
        ]);

        // Redirect to admin dashboard
        return redirect()->route('admin.dashboard');
    }


    // Show admin login form
    public function showLoginForm()
    {
        return view('login-admin');
    }

    // Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && \Hash::check($request->password, $admin->password)) {
            // Login success, save session including user_type and user_role for middleware
            session([
                'admin_id' => $admin->id,
                'admin_name' => $admin->admin_name,
                'user_type' => 'admin',
                'user_role' => 'admin',
            ]);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Clear admin session
        $request->session()->forget('admin_id');
        $request->session()->flush();

        return redirect('/')->with('success', 'Admin logged out successfully');
    }


}
