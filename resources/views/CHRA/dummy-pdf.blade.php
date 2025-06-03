<!DOCTYPE html>
<html>
<head>
    <title>CHRA Report PDF</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2, h3 { margin-top: 20px; }
        table {
            max-width: 700px;
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            table-layout: fixed;
            word-wrap: break-word;
        }
        th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
            vertical-align: top;
            white-space: normal;
            word-wrap: break-word;
        }
    </style>

</head>
<body>
    <h2>Chemical Health Risk Assessment Report</h2>

    <p><strong>Assessment Date:</strong> {{ $entry->assessment_date }}</p>
    <p><strong>Report No:</strong> {{ $entry->reference_no }}</p>
    <p><strong>Assessor:</strong> {{ $entry->assessor_name }}</p>
    <p><strong>Company:</strong> {{ $entry->company_name }}</p>
    <p><strong>Address:</strong> {{ $entry->address }}</p>
    <p><strong>Contact Person:</strong> {{ $entry->contact_person ?? '-' }}</p>

    <h3>General Information</h3>
    <table>
        <tr><th>Industry / Sector</th><td>{{ $entry->industry_type }}</td></tr>
        <tr><th>Task Assessed</th><td>{{ $entry->task }}</td></tr>
        <tr><th>Department / Section</th><td>{{ $entry->department }}</td></tr>
    </table>

    <h3>Chemical Information</h3>
    <table>
        <tr><th>Chemical Name</th><td>{{ $entry->chemical_name }}</td></tr>
        <tr><th>CAS Number</th><td>{{ $entry->cas_number }}</td></tr>
        <tr><th>Classification</th><td>{{ $entry->chemical_classification }}</td></tr>
        <tr><th>Use</th><td>{{ $entry->chemical_use }}</td></tr>
        <tr><th>Quantity</th><td>{{ $entry->quantity_used }}</td></tr>
        <tr><th>Physical Form</th><td>{{ $entry->physical_form }}</td></tr>
        <tr><th>Exposure Route</th><td>{{ $entry->exposure_route }}</td></tr>
    </table>

    <h3>Work Process Description</h3>
    <table>
        <tr><th>Description</th><td>{{ $entry->task_description }}</td></tr>
        <tr><th>Frequency & Duration</th><td>{{ $entry->frequency_duration }}</td></tr>
        <tr><th>Workers Exposed</th><td>{{ $entry->workers_exposed }}</td></tr>
        <tr><th>Engineering Controls</th><td>{{ $entry->engineering_controls }}</td></tr>
        <tr><th>Administrative Controls</th><td>{{ $entry->admin_controls }}</td></tr>
        <tr><th>PPE Used</th><td>{{ $entry->ppe_used }}</td></tr>
    </table>

    <h3>Exposure Evaluation</h3>
    <table>
        <tr><th>Method of Exposure</th><td>{{ $entry->exposure_method }}</td></tr>
        <tr><th>Potential for Exposure</th><td>{{ $entry->exposure_potential }}</td></tr>
        <tr><th>Measured Level</th><td>{{ $entry->measured_level }}</td></tr>
        <tr><th>OEL</th><td>{{ $entry->oel }}</td></tr>
        <tr><th>Comparison with OEL</th><td>{{ $entry->oel_comparison }}</td></tr>
    </table>

    <h3>Health Risk Rating</h3>
    <table>
        <tr><th>Health Severity</th><td>{{ $entry->health_severity }}</td></tr>
        <tr><th>Likelihood of Exposure</th><td>{{ $entry->exposure_likelihood }}</td></tr>
        <tr><th>Risk Level</th><td>{{ $entry->risk_level }}</td></tr>
        <tr><th>Recommendations</th><td>{{ $entry->risk_recommendations }}</td></tr>
    </table>

    <h3>Conclusion & Recommendations</h3>
    <table>
        <tr><th>Summary of Risks</th><td>{{ $entry->risk_summary }}</td></tr>
        <tr><th>Control Measures</th><td>{{ $entry->control_measures }}</td></tr>
        <tr><th>Training Requirements</th><td>{{ $entry->training_requirements }}</td></tr>
        <tr><th>Monitoring Suggestions</th><td>{{ $entry->monitoring_suggestions }}</td></tr>
        <tr><th>Schedule for Reassessment</th><td>{{ $entry->reassessment_schedule }}</td></tr>
    </table>

    <h3>Acknowledgement & Approval</h3>
    <table>
        <tr><th>CHRA Assessor Signature</th><td>{{ $entry->assessor_signature }}</td></tr>
        <tr><th>Date of Report</th><td>{{ $entry->report_date }}</td></tr>
        <tr><th>Employer Signature</th><td>{{ $entry->employer_signature }}</td></tr>
        <tr><th>Date of Acknowledgement</th><td>{{ $entry->acknowledgement_date }}</td></tr>
    </table>
</body>
</html>
