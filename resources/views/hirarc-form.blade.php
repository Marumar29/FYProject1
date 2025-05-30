@extends('layouts.app')

@section('title', 'Create HIRARC Report')

@section('content')
<div class="container">
    <h1>Create HIRARC Report</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('hirarc.store') }}" method="POST">
        @csrf

        <!-- Prepared/Reviewed/Approved By Section -->
        <div class="row">
            <div class="row">
                <div class="col-md-4">
                    <h5>Prepared By</h5>
                    <div class="mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" name="prepared_by_name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Position</label>
                        <input type="text" name="prepared_by_position" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Date</label>
                        <input type="date" name="prepared_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Reviewed By</h5>
                    <div class="mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" name="reviewed_by_name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Position</label>
                        <input type="text" name="reviewed_by_position" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Date</label>
                        <input type="date" name="reviewed_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Approved By</h5>
                    <div class="mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" name="approved_by_name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Position</label>
                        <input type="text" name="approved_by_position" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Date</label>
                        <input type="date" name="approved_date" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <!-- Risk Assessment Criteria Table -->
        <h4>Table 1: Risk Assessment Criteria</h4>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Likelihood</th>
                    <th>Description</th>
                    <th>Severity</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td><td>Most unlikely</td>
                    <td>1</td><td>Trivial injury</td>
                </tr>
                <tr>
                    <td>2</td><td>Not likely to occur</td>
                    <td>2</td><td>Minor injury</td>
                </tr>
                <tr>
                    <td>3</td><td>Likely to occur</td>
                    <td>3</td><td>Major injury</td>
                </tr>
                <tr>
                    <td>4</td><td>Very likely to occur</td>
                    <td>4</td><td>Fatality</td>
                </tr>
            </tbody>
        </table>

        <!-- Hazard Entries (Table 2) -->
        <h4>Table 2: HIRARC Assessment</h4>

        <div id="hazard-entries">
            <!-- Hazard entries will be added here dynamically -->
        </div>

        <button type="button" class="btn btn-secondary" onclick="addHazardEntry()">Add Hazard Entry</button>

        <button type="submit" class="btn btn-primary">Submit Report</button>
    </form>
</div>

<!-- Add this inside your <script> block -->
<script>
    let entryIndex = 0;

    function addHazardEntry() {
        const container = document.getElementById('hazard-entries');
        const div = document.createElement('div');
        div.classList.add('card', 'mb-3', 'p-3', 'border', 'border-secondary');
        div.innerHTML = `
            <h5>Hazard Entry</h5>

            <!-- Remove button -->
            <div class="text-end mb-2">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeHazardEntry(this)">Remove</button>
            </div>

            <!-- Department Info for this hazard -->
            <div class="mb-2">
                <label class="form-label">Department</label>
                <input type="text" name="entries[${entryIndex}][department]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Section</label>
                <input type="text" name="entries[${entryIndex}][section]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Responsible Person</label>
                <input type="text" name="entries[${entryIndex}][responsible_person]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Report Date</label>
                <input type="date" name="entries[${entryIndex}][report_date]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Revision No.</label>
                <input type="text" name="entries[${entryIndex}][revision_no]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Activity</label>
                <input type="text" name="entries[${entryIndex}][activity]" class="form-control" required>
            </div>

            <!-- Hazard Assessment Fields -->
            <div class="mb-2">
                <label class="form-label">Task</label>
                <input type="text" name="entries[${entryIndex}][task]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Hazard</label>
                <input type="text" name="entries[${entryIndex}][hazard]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Risk Rating</label>
                <input type="text" name="entries[${entryIndex}][risk]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Likelihood (1-4)</label>
                <input type="number" name="entries[${entryIndex}][likelihood]" class="form-control" min="1" max="4" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Severity (1-4)</label>
                <input type="number" name="entries[${entryIndex}][severity]" class="form-control" min="1" max="4" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Significant (Yes/No)</label>
                <select name="entries[${entryIndex}][significant]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label">Existing Control Measures</label>
                <input type="text" name="entries[${entryIndex}][control]" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label">Remarks</label>
                <input type="text" name="entries[${entryIndex}][remarks]" class="form-control">
            </div>
        `;
        container.appendChild(div);
        entryIndex++;
    }

    function removeHazardEntry(button) {
        const entryCard = button.closest('.card');
        if (entryCard) {
            entryCard.remove();
        }
    }
</script>

@endsection
