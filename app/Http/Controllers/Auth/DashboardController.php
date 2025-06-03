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

    public function viewReports(Request $request, $id)
    {
        $module = $request->query('module', 'hirarc'); // default to HIRARC

        // Just dummy org name for now
        $organization = (object)[
            'id' => $id,
            'org_name' => 'Dummy Organization'
        ];

        if ($module === 'chra') {
            $reports = collect([
                (object)[
                    'chemical_name' => 'Acetone',
                    'cas_no' => '67-64-1',
                    'usage_description' => 'Used for cleaning',
                    'risk_level' => 'High',
                    'recommendations' => 'Use in well-ventilated area'
                ],
            ]);
        } elseif ($module === 'nra') {
            $reports = collect([
                (object)[
                    'noise_source' => 'Compressor',
                    'exposure_level' => '95 dB',
                    'duration' => '3 hours/day',
                    'risk_rating' => 'High',
                    'controls' => 'Use hearing protection'
                ],
            ]);
        } else {
            $reports = collect([
                (object)[
                    'prepared_by_position' => 'Safety Officer',
                    'prepared_date' => '2024-06-01',
                    'reviewed_by_position' => 'Manager',
                    'reviewed_date' => '2024-06-02',
                    'approved_by_position' => 'Director',
                    'approved_date' => '2024-06-03',
                    'hazardEntries' => [
                        (object)[
                            'task' => 'Welding',
                            'hazard' => 'Fumes',
                            'likelihood' => '3',
                            'severity' => '4',
                            'risk' => '12',
                            'significant' => 'Yes',
                            'control' => 'Use mask',
                            'remarks' => 'Ensure ventilation'
                        ]
                    ]
                ]
            ]);
        }

        return view('admin-view-reports', compact('organization', 'reports', 'module'));
    }


}
