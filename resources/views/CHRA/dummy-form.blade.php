@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">CHRA Dummy Form</h2>
    <form method="POST" action="{{ route('chra_dummy.store') }}">
        @csrf

        {{-- Section 1: General Information --}}
        <h4>1. General Information</h4>
        <div class="mb-3">
            <label for="company_name">Company Name</label>
            <input id="company_name" type="text" name="company_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address">Address of Premises</label>
            <input id="address" type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="assessment_date">Assessment Date</label>
            <input id="assessment_date" type="date" name="assessment_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="assessor_name">Assessor Name & Registration No.</label>
            <input id="assessor_name" type="text" name="assessor_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="reference_no">CHRA Reference No.</label>
            <input id="reference_no" type="text" name="reference_no" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="industry_type">Type of Industry / Sector</label>
            <input id="industry_type" type="text" name="industry_type" class="form-control">
        </div>
        <div class="mb-3">
            <label for="task">Job / Task Being Assessed</label>
            <input id="task" type="text" name="task" class="form-control">
        </div>
        <div class="mb-3">
            <label for="department">Department / Section</label>
            <input id="department" type="text" name="department" class="form-control">
        </div>

        {{-- Section 2: Chemical Information --}}
        <h4 class="mt-5">2. Chemical Information</h4>
        <div class="mb-3">
            <label for="chemical_name">Name of Chemical</label>
            <input id="chemical_name" type="text" name="chemical_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cas_number">CAS Number</label>
            <input id="cas_number" type="text" name="cas_number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="chemical_classification">Chemical Classification</label>
            <input id="chemical_classification" type="text" name="chemical_classification" class="form-control">
        </div>
        <div class="mb-3">
            <label for="chemical_use">Use of Chemical</label>
            <input id="chemical_use" type="text" name="chemical_use" class="form-control">
        </div>
        <div class="mb-3">
            <label for="quantity_used">Quantity Used</label>
            <input id="quantity_used" type="text" name="quantity_used" class="form-control">
        </div>
        <div class="mb-3">
            <label for="physical_form">Physical Form</label>
            <input id="physical_form" type="text" name="physical_form" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exposure_route">Exposure Route</label>
            <input id="exposure_route" type="text" name="exposure_route" class="form-control">
        </div>

        {{-- Section 3: Work Process Description --}}
        <h4 class="mt-5">3. Work Process Description</h4>
        <div class="mb-3">
            <label for="task_description">Description of Task/Process</label>
            <textarea id="task_description" name="task_description" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="frequency_duration">Frequency & Duration</label>
            <input id="frequency_duration" type="text" name="frequency_duration" class="form-control">
        </div>
        <div class="mb-3">
            <label for="workers_exposed">No. of Workers Exposed</label>
            <input id="workers_exposed" type="number" name="workers_exposed" class="form-control" min="0">
        </div>
        <div class="mb-3">
            <label for="engineering_controls">Engineering Controls</label>
            <input id="engineering_controls" type="text" name="engineering_controls" class="form-control">
        </div>
        <div class="mb-3">
            <label for="admin_controls">Administrative Controls</label>
            <input id="admin_controls" type="text" name="admin_controls" class="form-control">
        </div>
        <div class="mb-3">
            <label for="ppe_used">PPE Used</label>
            <input id="ppe_used" type="text" name="ppe_used" class="form-control">
        </div>

        {{-- Section 4: Exposure Evaluation --}}
        <h4 class="mt-5">4. Exposure Evaluation</h4>
        <div class="mb-3">
            <label for="exposure_method">Method of Exposure</label>
            <input id="exposure_method" type="text" name="exposure_method" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exposure_potential">Potential for Exposure</label>
            <select id="exposure_potential" name="exposure_potential" class="form-control">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="measured_level">Measured Exposure Level</label>
            <input id="measured_level" type="text" name="measured_level" class="form-control">
        </div>
        <div class="mb-3">
            <label for="oel">Occupational Exposure Limit (OEL)</label>
            <input id="oel" type="text" name="oel" class="form-control">
        </div>
        <div class="mb-3">
            <label for="oel_comparison">Comparison with OEL</label>
            <input id="oel_comparison" type="text" name="oel_comparison" class="form-control">
        </div>

        {{-- Section 5: Health Risk Rating --}}
        <h4 class="mt-5">5. Health Risk Rating</h4>
        <div class="mb-3">
            <label for="health_severity">Severity of Health Effects</label>
            <input id="health_severity" type="text" name="health_severity" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exposure_likelihood">Likelihood of Exposure</label>
            <input id="exposure_likelihood" type="text" name="exposure_likelihood" class="form-control">
        </div>
        <div class="mb-3">
            <label for="risk_level">Risk Level</label>
            <select id="risk_level" name="risk_level" class="form-control">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="risk_recommendations">Risk Control Recommendations</label>
            <textarea id="risk_recommendations" name="risk_recommendations" class="form-control" rows="3"></textarea>
        </div>

        {{-- Section 6: Conclusion & Recommendations --}}
        <h4 class="mt-5">6. Conclusion & Recommendations</h4>
        <div class="mb-3">
            <label for="risk_summary">Summary of Risks</label>
            <textarea id="risk_summary" name="risk_summary" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="control_measures">Proposed Control Measures</label>
            <textarea id="control_measures" name="control_measures" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="training_requirements">Training Requirements</label>
            <textarea id="training_requirements" name="training_requirements" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="monitoring_suggestions">Monitoring Suggestions</label>
            <textarea id="monitoring_suggestions" name="monitoring_suggestions" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="reassessment_schedule">Schedule for Reassessment</label>
            <input id="reassessment_schedule" type="date" name="reassessment_schedule" class="form-control">
        </div>

        {{-- Section 7: Acknowledgement & Approval --}}
        <h4 class="mt-5">7. Acknowledgement & Approval</h4>
        <div class="mb-3">
            <label for="assessor_signature">CHRA Assessor Name & Signature</label>
            <input id="assessor_signature" type="text" name="assessor_signature" class="form-control">
        </div>
        <div class="mb-3">
            <label for="report_date">Date of Report</label>
            <input id="report_date" type="date" name="report_date" class="form-control">
        </div>
        <div class="mb-3">
            <label for="employer_signature">Employer’s Name & Signature</label>
            <input id="employer_signature" type="text" name="employer_signature" class="form-control">
        </div>
        <div class="mb-3">
            <label for="acknowledgement_date">Date of Acknowledgement</label>
            <input id="acknowledgement_date" type="date" name="acknowledgement_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit CHRA</button>
        <a href="{{ route('org.dashboard') }}" class="btn btn-success mt-3">Back</a>
    </form>
</div>
@endsection
