<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HirarcReport;
use App\Models\Organization;
use Illuminate\Support\Facades\Session;

class HirarcController extends Controller
{
    // Show form to create a new HIRARC report
    public function create()
    {
        // Optional: Check if org is logged in
        if (!Session::has('org_id')) {
            return redirect()->route('login-org')->with('error', 'Please login first.');
        }

        return view('hirarc-form');
    }

    // Store submitted HIRARC data
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required',
            'hazard' => 'required',
            'risk' => 'required',
            'likelihood' => 'required',
            'severity' => 'required',
            'risk_rating' => 'required',
            'control_measure' => 'required',

            'prepared_by_name' => 'required',
            'prepared_by_position' => 'required',
            'prepared_date' => 'required|date',

            'reviewed_by_name' => 'required',
            'reviewed_by_position' => 'required',
            'reviewed_date' => 'required|date',

            'approved_by_name' => 'required',
            'approved_by_position' => 'required',
            'approved_date' => 'required|date',
        ]);

        HirarcReport::create([
            'organization_id' => session('org_id'),
            'task' => $request->task,
            'hazard' => $request->hazard,
            'risk' => $request->risk,
            'likelihood' => $request->likelihood,
            'severity' => $request->severity,
            'risk_rating' => $request->risk_rating,
            'control_measure' => $request->control_measure,

            'prepared_by_name' => $request->prepared_by_name,
            'prepared_by_position' => $request->prepared_by_position,
            'prepared_date' => $request->prepared_date,

            'reviewed_by_name' => $request->reviewed_by_name,
            'reviewed_by_position' => $request->reviewed_by_position,
            'reviewed_date' => $request->reviewed_date,

            'approved_by_name' => $request->approved_by_name,
            'approved_by_position' => $request->approved_by_position,
            'approved_date' => $request->approved_date,
        ]);

        return redirect()->back()->with('success', 'HIRARC report saved successfully.');
    }
}
