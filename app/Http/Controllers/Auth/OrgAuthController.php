<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrgAuthController extends Controller
{
    // Show registration form
    public function showRegisterForm()
    {
        return view('register-org');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate input data
        $request->validate([
            'org_name' => 'required|string|max:255',
            'email' => 'required|email|unique:organizations,email',
            'password' => 'required|confirmed|min:6',
            'registration_number' => 'required|string|unique:organizations,registration_number',
            'org_type' => 'required|string',
        ]);

        // Create organization record
        $organization = Organization::create([
            'org_name' => $request->org_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'registration_number' => $request->registration_number,
            'org_type' => $request->org_type,
        ]);

        // Set session after registration
        session([
            'org_id' => $organization->id,
            'org_name' => $organization->org_name,
        ]);

        // Redirect to org dashboard
        return redirect()->route('org.dashboard');
    }


    // Show org login form
    public function showLoginForm()
    {
        return view('login-org');
    }

    // Handle org login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $org = Organization::where('email', $request->email)->first();

        if ($org && \Hash::check($request->password, $org->password)) {
            // Login success, save session or whatever you do
            session(['org_id' => $org->id, 'org_name' => $org->org_name]);
            return redirect()->route('org.dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Clear org session
        $request->session()->forget('org_id');
        $request->session()->flush();

        return redirect('/')->with('success', 'Organization logged out successfully');
    }


}
