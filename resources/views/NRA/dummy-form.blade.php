@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>NRA Dummy Form</h2>
    <form action="{{ route('nra_dummy.submit') }}" method="POST">
        @csrf

        <h5 class="mt-4">General Information</h5>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Assessment Date</label>
                <input type="date" name="assessment_date" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Report Number</label>
                <input type="text" name="report_number" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Assessor Name</label>
                <input type="text" name="assessor_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Assessor DOSH Reg. No</label>
                <input type="text" name="assessor_reg_no" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Company Name</label>
                <input type="text" name="company_name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Company DOSH Reg. No</label>
                <input type="text" name="company_dosh_reg_no" class="form-control" required>
            </div>
            <div class="col-md-12">
                <label class="form-label">Company Address</label>
                <input type="text" name="company_address" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Contact Person</label>
                <input type="text" name="contact_person" class="form-control" required>
            </div>
        </div>

        <h5 class="mt-5">Personal Exposure Monitoring (up to 5 workers)</h5>
        @for ($i = 0; $i < 5; $i++)
        <div class="border p-3 bg-light rounded mb-4">
            <h6>Worker #{{ $i + 1 }}</h6>
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Name</label><input type="text" name="workers[{{ $i }}][name]" class="form-control"></div>
                <div class="col-md-6"><label class="form-label">Job Title</label><input type="text" name="workers[{{ $i }}][job]" class="form-control"></div>
                <div class="col-md-6"><label class="form-label">Working Area</label><input type="text" name="workers[{{ $i }}][area]" class="form-control"></div>
                <div class="col-md-6"><label class="form-label">Dosimeter ID</label><input type="text" name="workers[{{ $i }}][dosimeter]" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">Duration (hrs)</label><input type="number" step="0.01" name="workers[{{ $i }}][duration]" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">LEX,8h</label><input type="text" name="workers[{{ $i }}][lex]" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">LMax</label><input type="text" name="workers[{{ $i }}][lmax]" class="form-control"></div>
                <div class="col-md-4"><label class="form-label">LPeak</label><input type="text" name="workers[{{ $i }}][lpeak]" class="form-control"></div>
            </div>
        </div>
        @endfor

        <h5 class="mt-5">Acknowledgement</h5>
        <div class="row g-3">
            <div class="col-md-4"><label class="form-label">Received By</label><input type="text" name="ack_name" class="form-control"></div>
            <div class="col-md-4"><label class="form-label">Designation</label><input type="text" name="ack_designation" class="form-control"></div>
            <div class="col-md-4"><label class="form-label">Date</label><input type="date" name="ack_date" class="form-control"></div>
            <div class="col-md-12"><label class="form-label">Signature (Text)</label><input type="text" name="ack_signature" class="form-control"></div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary mt-3">Submit NRA</button>
            <a href="{{ route('org.dashboard') }}" class="btn btn-success mt-3">Back</a>
        </div>
    </form>
</div>
@endsection
