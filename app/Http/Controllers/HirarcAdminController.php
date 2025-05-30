<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HirarcReport;

class HirarcAdminController extends Controller
{
    public function index()
    {
        $reports = HirarcReport::select('report_id')
            ->distinct()
            ->orderBy('report_id', 'desc')
            ->get();

        return view('admin.hirarc.index', compact('reports'));
    }

    public function show($reportId)
    {
        $entries = HirarcReport::where('report_id', $reportId)->get();

        if ($entries->isEmpty()) {
            abort(404);
        }

        return view('admin.hirarc.show', compact('entries'));
    }
}
