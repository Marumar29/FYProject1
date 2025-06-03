@extends('layouts.app')

@section('content')
<div class="container mt-4">    
    <h2>NRA Report Lists</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($data) > 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Assessment Date</th>
                    <th>Report No.</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $report)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $report['company_name'] ?? '-' }}</td>
                    <td>{{ $report['assessment_date'] ?? '-' }}</td>
                    <td>{{ $report['report_number'] ?? '-' }}</td>
                    <td>
                        <a href="{{ route('nra_dummy.show', ['id' => $index]) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('nra_dummy.pdf') }}" class="btn btn-secondary btn-sm" target="_blank">Download PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No NRA reports submitted yet.</p>
    @endif

    <a href="{{ route('nra_dummy.form') }}" class="btn btn-success mt-3">Create New Report</a>
    <a href="{{ route('org.dashboard') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
