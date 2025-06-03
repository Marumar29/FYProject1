@extends('layouts.adminapp')

@section('content')
<div class="container">
    <h3>{{ $organization->org_name }} -
        @if($module == 'chra')
            CHRA Reports
        @elseif($module == 'nra')
            NRA Reports
        @else
            HIRARC Reports
        @endif
    </h3>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary my-3">← Back to Dashboard</a>

    @if ($reports->count() > 0)
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    @if($module == 'hirarc')
                        <th>Activity</th>
                        <th>Hazard</th>
                        <th>Likelihood</th>
                        <th>Severity</th>
                        <th>Risk</th>
                        <th>Risk Rating</th>
                        <th>Controls</th>
                        <th>Remarks</th>
                        <th>Prepared</th>
                        <th>Reviewed</th>
                        <th>Approved</th>
                    @elseif($module == 'chra')
                        <th>Chemical Name</th>
                        <th>CAS No</th>
                        <th>Usage</th>
                        <th>Risk Level</th>
                        <th>Recommendations</th>
                    @elseif($module == 'nra')
                        <th>Noise Source</th>
                        <th>Exposure Level</th>
                        <th>Duration</th>
                        <th>Risk</th>
                        <th>Controls</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    @if($module == 'hirarc')
                        @foreach($report->hazardEntries as $entry)
                            <tr>
                                <td>{{ $entry->task }}</td>
                                <td>{{ $entry->hazard }}</td>
                                <td>{{ $entry->likelihood }}</td>
                                <td>{{ $entry->severity }}</td>
                                <td>{{ $entry->risk }}</td>
                                <td>{{ $entry->significant }}</td>
                                <td>{{ $entry->control }}</td>
                                <td>{{ $entry->remarks }}</td>
                                <td>{{ $report->prepared_by_position }}<br><small>{{ $report->prepared_date }}</small></td>
                                <td>{{ $report->reviewed_by_position }}<br><small>{{ $report->reviewed_date }}</small></td>
                                <td>{{ $report->approved_by_position }}<br><small>{{ $report->approved_date }}</small></td>
                            </tr>
                        @endforeach
                    @elseif($module == 'chra')
                        <tr>
                            <td>{{ $report->chemical_name }}</td>
                            <td>{{ $report->cas_no }}</td>
                            <td>{{ $report->usage_description }}</td>
                            <td>{{ $report->risk_level }}</td>
                            <td>{{ $report->recommendations }}</td>
                        </tr>
                    @elseif($module == 'nra')
                        <tr>
                            <td>{{ $report->noise_source }}</td>
                            <td>{{ $report->exposure_level }}</td>
                            <td>{{ $report->duration }}</td>
                            <td>{{ $report->risk_rating }}</td>
                            <td>{{ $report->controls }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">No {{ strtoupper($module) }} reports submitted by this organization.</div>
    @endif
</div>
@endsection
