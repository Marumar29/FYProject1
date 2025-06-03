<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class HirarcDummyController extends Controller
{
    public function showForm()
    {
        return view('HIRARC.dummy-form');
    }

    public function submitForm(Request $request)
    {
        // Just save data temporarily to session
        session(['dummy_hirarc' => $request->all()]);
        return redirect()->route('hirarc_dummy.list')->with('success', 'HIRARC Dummy Form submitted.');
    }

    public function listReports()
    {
        $data = session('dummy_hirarc') ? [session('dummy_hirarc')] : [];
        return view('HIRARC.dummy-list', compact('data'));
    }

    public function showReport($id)
    {
        $data = session('dummy_hirarc');
        return view('HIRARC.dummy-show', compact('data'));
    }

    public function generatePdf()
    {
        $data = session('dummy_hirarc');
        $pdf = PDF::loadView('HIRARC.dummy-pdf', compact('data'));
        return $pdf->stream('HIRARC.pdf');
    }
}


// ALL THE METHODS IN THIS CONTROLLER ARE DUMMY METHODS FOR TESTING PURPOSES 