@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">CHRA Submissions</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($entries) === 0)
        <p>No CHRA entries found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company</th>
                    <th>Chemical</th>
                    <th>Date</th>
                    <th>Risk Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <td>{{ $entry['id'] }}</td>
                        <td>{{ $entry['company_name'] }}</td>
                        <td>{{ $entry['chemical_name'] }}</td>
                        <td>{{ $entry['assessment_date'] }}</td>
                        <td>{{ $entry['risk_level'] }}</td>
                        <td>
                            <a href="{{ route('chra_dummy.show', $entry['id']) }}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('chra_dummy.pdf', $entry['id']) }}" class="btn btn-sm btn-secondary">Generate PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
        <a href="{{ route('chra_dummy.form') }}" class="btn btn-success mt-3">Create New Report</a>
        <a href="{{ route('org.dashboard') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
