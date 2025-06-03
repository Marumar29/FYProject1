<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class NRADummyController extends Controller
{
    public function showForm()
    {
        return view('NRA.dummy-form');
    }

    public function submitForm(Request $request)
    {
        session(['dummy_nra' => $request->all()]);
        return redirect()->route('nra_dummy.list')->with('success', 'NRA Dummy Form submitted.');
    }

    public function listReports()
    {
        $data = session('dummy_nra') ? [session('dummy_nra')] : [];
        return view('NRA.dummy-list', compact('data'));
    }

    public function showReport($id)
    {
        $data = session('dummy_nra');
        return view('NRA.dummy-show', compact('data'));
    }

    public function generatePdf()
    {
        $data = session('dummy_nra');
        $pdf = PDF::loadView('NRA.dummy-pdf', compact('data'));
        return $pdf->stream('NRA_Report.pdf');
    }
}
