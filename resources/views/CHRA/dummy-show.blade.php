@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">CHRA Report Details</h2>

    {{-- Section 1: General Information --}}
    <h4>1. General Information</h4>
    <table class="table table-bordered">
        <tr><th>Company Name</th><td>{{ $entry->company_name }}</td></tr>
        <tr><th>Address of Premises</th><td>{{ $entry->address }}</td></tr>
        <tr><th>Assessment Date</th><td>{{ $entry->assessment_date }}</td></tr>
        <tr><th>Assessor Name & Reg. No.</th><td>{{ $entry->assessor_name }}</td></tr>
        <tr><th>CHRA Reference No.</th><td>{{ $entry->reference_no }}</td></tr>
        <tr><th>Industry / Sector</th><td>{{ $entry->industry_type }}</td></tr>
        <tr><th>Task Assessed</th><td>{{ $entry->task }}</td></tr>
        <tr><th>Department / Section</th><td>{{ $entry->department }}</td></tr>
    </table>

    {{-- Section 2: Chemical Information --}}
    <h4>2. Chemical Information</h4>
    <table class="table table-bordered">
        <tr><th>Chemical Name</th><td>{{ $entry->chemical_name }}</td></tr>
        <tr><th>CAS Number</th><td>{{ $entry->cas_number }}</td></tr>
        <tr><th>Classification</th><td>{{ $entry->chemical_classification }}</td></tr>
        <tr><th>Use</th><td>{{ $entry->chemical_use }}</td></tr>
        <tr><th>Quantity</th><td>{{ $entry->quantity_used }}</td></tr>
        <tr><th>Physical Form</th><td>{{ $entry->physical_form }}</td></tr>
        <tr><th>Exposure Route</th><td>{{ $entry->exposure_route }}</td></tr>
    </table>

    {{-- Section 3: Work Process Description --}}
    <h4>3. Work Process Description</h4>
    <table class="table table-bordered">
        <tr><th>Description</th><td>{{ $entry->task_description }}</td></tr>
        <tr><th>Frequency & Duration</th><td>{{ $entry->frequency_duration }}</td></tr>
        <tr><th>Workers Exposed</th><td>{{ $entry->workers_exposed }}</td></tr>
        <tr><th>Engineering Controls</th><td>{{ $entry->engineering_controls }}</td></tr>
        <tr><th>Administrative Controls</th><td>{{ $entry->admin_controls }}</td></tr>
        <tr><th>PPE Used</th><td>{{ $entry->ppe_used }}</td></tr>
    </table>

    {{-- Section 4: Exposure Evaluation --}}
    <h4>4. Exposure Evaluation</h4>
    <table class="table table-bordered">
        <tr><th>Method of Exposure</th><td>{{ $entry->exposure_method }}</td></tr>
        <tr><th>Potential for Exposure</th><td>{{ $entry->exposure_potential }}</td></tr>
        <tr><th>Measured Level</th><td>{{ $entry->measured_level }}</td></tr>
        <tr><th>OEL</th><td>{{ $entry->oel }}</td></tr>
        <tr><th>Comparison with OEL</th><td>{{ $entry->oel_comparison }}</td></tr>
    </table>

    {{-- Section 5: Health Risk Rating --}}
    <h4>5. Health Risk Rating</h4>
    <table class="table table-bordered">
        <tr><th>Health Severity</th><td>{{ $entry->health_severity }}</td></tr>
        <tr><th>Likelihood of Exposure</th><td>{{ $entry->exposure_likelihood }}</td></tr>
        <tr><th>Risk Level</th><td>{{ $entry->risk_level }}</td></tr>
        <tr><th>Recommendations</th><td>{{ $entry->risk_recommendations }}</td></tr>
    </table>

    {{-- Section 6: Conclusion & Recommendations --}}
    <h4>6. Conclusion & Recommendations</h4>
    <table class="table table-bordered">
        <tr><th>Summary of Risks</th><td>{{ $entry->risk_summary }}</td></tr>
        <tr><th>Control Measures</th><td>{{ $entry->control_measures }}</td></tr>
        <tr><th>Training Requirements</th><td>{{ $entry->training_requirements }}</td></tr>
        <tr><th>Monitoring Suggestions</th><td>{{ $entry->monitoring_suggestions }}</td></tr>
        <tr><th>Schedule for Reassessment</th><td>{{ $entry->reassessment_schedule }}</td></tr>
    </table>

    {{-- Section 7: Acknowledgement & Approval --}}
    <h4>7. Acknowledgement & Approval</h4>
    <table class="table table-bordered">
        <tr><th>CHRA Assessor Signature</th><td>{{ $entry->assessor_signature }}</td></tr>
        <tr><th>Date of Report</th><td>{{ $entry->report_date }}</td></tr>
        <tr><th>Employer Signature</th><td>{{ $entry->employer_signature }}</td></tr>
        <tr><th>Date of Acknowledgement</th><td>{{ $entry->acknowledgement_date }}</td></tr>
    </table>

    <a href="{{ route('chra_dummy.list', $entry->id) }}" class="btn btn-primary mt-3">Back</a>
</div>
@endsection
