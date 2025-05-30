<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HirarcReport;
use App\Models\HazardEntry;
use Illuminate\Support\Facades\Session;

class HirarcController extends Controller
{
    public function create()
    {
        if (!Session::has('org_id')) {
            return redirect()->route('login-org')->with('error', 'Please login first.');
        }

        return view('hirarc-form');
    }

    public function store(Request $request)
    {
        \Log::info('HIRARC STORE called');

        $validated = $request->validate([
            'prepared_by_name' => 'required|string|max:255',
            'prepared_by_position' => 'required|string',
            'prepared_date' => 'required|date',
            'reviewed_by_name' => 'required|string|max:255',
            'reviewed_by_position' => 'required|string',
            'reviewed_date' => 'required|date',
            'approved_by_name' => 'required|string|max:255',
            'approved_by_position' => 'required|string',
            'approved_date' => 'required|date',
            'entries' => 'required|array|min:1',
            'entries.*.department' => 'required|string',
            'entries.*.section' => 'required|string',
            'entries.*.responsible_person' => 'required|string',
            'entries.*.report_date' => 'required|date',
            'entries.*.revision_no' => 'required|string',
            'entries.*.activity' => 'required|string',
            'entries.*.task' => 'required|string',
            'entries.*.hazard' => 'required|string',
            'entries.*.risk' => 'required|integer',
            'entries.*.likelihood' => 'required|integer',
            'entries.*.severity' => 'required|integer',
            'entries.*.significant' => 'nullable|string',
            'entries.*.control' => 'nullable|string',
            'entries.*.remarks' => 'nullable|string',
        ]);

        try {
            $hirarc = new HirarcReport();
            $hirarc->organization_id = session('org_id');
            $hirarc->prepared_by_position = $validated['prepared_by_position'];
            $hirarc->prepared_date = $validated['prepared_date'];
            $hirarc->reviewed_by_position = $validated['reviewed_by_position'];
            $hirarc->reviewed_date = $validated['reviewed_date'];
            $hirarc->approved_by_position = $validated['approved_by_position'];
            $hirarc->approved_date = $validated['approved_date'];
            $hirarc->prepared_by_name = $request->input('prepared_by_name');
            $hirarc->reviewed_by_name = $request->input('reviewed_by_name');
            $hirarc->approved_by_name = $request->input('approved_by_name');
            $hirarc->save();

            foreach ($validated['entries'] as $entry) {
                $hazard = new HazardEntry();
                $hazard->hirarc_report_id = $hirarc->id;
                $hazard->department = $entry['department'];
                $hazard->section = $entry['section'];
                $hazard->responsible_person = $entry['responsible_person'];
                $hazard->report_date = $entry['report_date'];
                $hazard->revision_no = $entry['revision_no'];
                $hazard->activity = $entry['activity'];
                $hazard->task = $entry['task'];
                $hazard->hazard = $entry['hazard'];
                $hazard->risk = $entry['risk'];
                $hazard->likelihood = $entry['likelihood'];
                $hazard->severity = $entry['severity'];
                $hazard->significant = $entry['significant'] ?? null;
                $hazard->control = $entry['control'] ?? null;
                $hazard->remarks = $entry['remarks'] ?? null;
                $hazard->save();
            }

            return redirect()->route('hirarc.index')->with('success', 'HIRARC report saved successfully!');
        } catch (\Exception $e) {
            \Log::error('Error saving HIRARC report: ' . $e->getMessage());
            return back()->withErrors(['Failed to save report.']);
        }
    }

    public function index()
    {
        \Log::info('Org ID in session: ' . session('org_id'));

        $orgId = session('org_id');
        if (!$orgId) {
            return redirect()->route('login-org')->with('error', 'Please login first.');
        }

        $reports = HirarcReport::where('organization_id', $orgId)->with('hazardEntries')->get();

        return view('hirarc-index', compact('reports'));
    }

    public function edit($id)
    {
        $orgId = session('org_id');
        $report = HirarcReport::where('id', $id)
            ->where('organization_id', $orgId)
            ->with('hazardEntries')
            ->firstOrFail();

        return view('hirarc-edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $orgId = session('org_id');
        $report = HirarcReport::where('id', $id)
            ->where('organization_id', $orgId)
            ->firstOrFail();

        $validated = $request->validate([
            'prepared_by_name' => 'required|string|max:255',
            'prepared_by_position' => 'required|string|max:255',
            'prepared_date' => 'required|date',
            'reviewed_by_name' => 'required|string|max:255',
            'reviewed_by_position' => 'required|string|max:255',
            'reviewed_date' => 'required|date',
            'approved_by_name' => 'required|string|max:255',
            'approved_by_position' => 'required|string|max:255',
            'approved_date' => 'required|date',
        ]);

        $report->update($validated);

        return redirect()->route('hirarc.index')->with('success', 'Report updated successfully!');
    }

    public function destroy($id)
    {
        $orgId = session('org_id');
        $report = HirarcReport::where('id', $id)
            ->where('organization_id', $orgId)
            ->firstOrFail();

        $report->delete();

        return redirect()->route('hirarc.index')->with('success', 'Report deleted successfully!');
    }
}
