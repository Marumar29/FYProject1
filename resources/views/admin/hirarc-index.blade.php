@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">All Submitted HIRARC Reports</h2>

<table class="table-auto w-full border">
    <thead>
        <tr>
            <th class="border px-4 py-2">Report ID</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reports as $report)
        <tr>
            <td class="border px-4 py-2">{{ $report->report_id }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('admin.hirarc.show', $report->report_id) }}" class="text-blue-600">View Report</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
