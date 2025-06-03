<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CHRA;


class CHRADummyController extends Controller
{
    // Show CHRA dummy form
    public function create()
    {
        return view('CHRA.dummy-form');
    }

    // Store dummy CHRA entry (temporary session-based)
    public function store(Request $request)
    {
        $validated = $request->validate([
            // Section 1: General Information
            'company_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'assessment_date' => 'required|date',
            'assessor_name' => 'required|string|max:255',
            'reference_no' => 'required|string|max:255',
            'industry_type' => 'nullable|string|max:255',
            'task' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',

            // Section 2: Chemical Information
            'chemical_name' => 'required|string|max:255',
            'cas_number' => 'nullable|string|max:255',
            'chemical_classification' => 'nullable|string|max:255',
            'chemical_use' => 'nullable|string|max:255',
            'quantity_used' => 'nullable|string|max:255',
            'physical_form' => 'nullable|string|max:255',
            'exposure_route' => 'nullable|string|max:255',

            // Section 3: Work Process Description
            'task_description' => 'nullable|string',
            'frequency_duration' => 'nullable|string|max:255',
            'workers_exposed' => 'nullable|integer',
            'engineering_controls' => 'nullable|string|max:255',
            'admin_controls' => 'nullable|string|max:255',
            'ppe_used' => 'nullable|string|max:255',

            // Section 4: Exposure Evaluation
            'exposure_method' => 'nullable|string|max:255',
            'exposure_potential' => 'nullable|string|max:255',
            'measured_level' => 'nullable|string|max:255',
            'oel' => 'nullable|string|max:255',
            'oel_comparison' => 'nullable|string|max:255',

            // Section 5: Health Risk Rating
            'health_severity' => 'nullable|string|max:255',
            'exposure_likelihood' => 'nullable|string|max:255',
            'risk_level' => 'nullable|string|max:255',
            'risk_recommendations' => 'nullable|string',

            // Section 6: Conclusion & Recommendations
            'risk_summary' => 'nullable|string',
            'control_measures' => 'nullable|string',
            'training_requirements' => 'nullable|string',
            'monitoring_suggestions' => 'nullable|string',
            'reassessment_schedule' => 'nullable|date',

            // Section 7: Acknowledgement & Approval
            'assessor_signature' => 'nullable|string|max:255',
            'report_date' => 'nullable|date',
            'employer_signature' => 'nullable|string|max:255',
            'acknowledgement_date' => 'nullable|date',
        ]);

        $entries = Session::get('chra_entries', []);

        // Assign a unique ID: if entries exist, use max + 1, else 1
        $validated['id'] = $entries ? max(array_column($entries, 'id')) + 1 : 1;

        $entries[] = $validated;

        Session::put('chra_entries', $entries);

        return redirect()->route('chra_dummy.list')->with('success', 'CHRA entry submitted.');
    }

    // Show list of CHRA entries
    public function index()
    {
        $entries = Session::get('chra_entries', []);
        return view('CHRA.dummy-list', compact('entries'));
    }

    // Show a single CHRA entry
    public function show($id)
    {
        $entries = Session::get('chra_entries', []);
        $entryArray = collect($entries)->firstWhere('id', (int) $id);

        if (!$entryArray) {
            return redirect()->route('chra_dummy.list')->with('error', 'Entry not found.');
        }

        $entry = (object) $entryArray;  // cast array to object

        return view('CHRA.dummy-show', compact('entry'));
    }

    // Show PDF view of a single CHRA entry
    public function pdf($id)
    {
        $entries = Session::get('chra_entries', []);
        $entryArray = collect($entries)->firstWhere('id', (int) $id);

        if (!$entryArray) {
            return redirect()->route('chra_dummy.list')->with('error', 'Entry not found.');
        }

        $entry = (object) $entryArray;  // cast array to object

        return view('CHRA.dummy-pdf', compact('entry'));
    }

    public function edit($id)
    {
        $entry = CHRA::findOrFail($id);
        return view('chra.dummy-edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $entry = CHRA::findOrFail($id);
        $entry->update($request->all());
        return redirect()->route('chra_dummy.list')->with('success', 'CHRA entry updated successfully.');
    }


}
