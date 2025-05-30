<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\Admin;
use App\Models\HirarcReport;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function orgDashboard()
    {
        $organization = Organization::find(session('user_id'));
        if (!$organization) {
            return redirect()->route('login-org')->with('error', 'Please login first.');
        }
        return view('org-dashboard', ['org' => $organization]);
    }

    public function adminDashboard(Request $request)
    {
        $admin = Admin::find(session('admin_id'));
        if (!$admin) {
            return redirect()->route('login-admin')->with('error', 'Please login first.');
        }

        $orgType = $request->input('org_type');

        $organizations = Organization::when($orgType, function ($query, $orgType) {
            return $query->where('org_type', $orgType);
        })->get();

        return view('admin-dashboard', [
            'admin' => $admin,
            'organizations' => $organizations,
        ]);
    }

    public function viewReports($id)
    {
        $organization = Organization::findOrFail($id);
        $reports = HirarcReport::where('organization_id', $organization->id)->get();

        return view('admin-view-reports', compact('organization', 'reports'));
    }

        public function index()
    {
        // Return your dashboard view here
        return view('org-dashboard'); // Adjust the view name if necessary
    }
}
