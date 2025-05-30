<!-- resources/views/hirarc-edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit HIRARC Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2>Edit HIRARC Report</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('hirarc.update', $report->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Task</label>
            <input type="text" name="task" class="form-control" value="{{ old('task', $report->task) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hazard</label>
            <input type="text" name="hazard" class="form-control" value="{{ old('hazard', $report->hazard) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Likelihood</label>
            <input type="number" name="likelihood" class="form-control" value="{{ old('likelihood', $report->likelihood) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Severity</label>
            <input type="number" name="severity" class="form-control" value="{{ old('severity', $report->severity) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Risk Rating</label>
            <input type="number" name="risk" class="form-control" value="{{ old('risk', $report->risk) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Significant</label>
            <input type="text" name="significant" class="form-control" value="{{ old('significant', $report->significant) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Control Measure</label>
            <textarea name="control" class="form-control" required>{{ old('control', $report->control) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Remarks</label>
            <textarea name="remarks" class="form-control">{{ old('remarks', $report->remarks) }}</textarea>
        </div>

        <h5 class="mt-4">Prepared By</h5>
        <div class="mb-3">
            <input type="text" name="prepared_by_name" class="form-control" placeholder="Name" value="{{ old('prepared_by_name', $report->prepared_by_name) }}" required>
        </div>
        <div class="mb-3">
            <input type="text" name="prepared_by_position" class="form-control" placeholder="Position" value="{{ old('prepared_by_position', $report->prepared_by_position) }}" required>
        </div>
        <div class="mb-3">
            <input type="date" name="prepared_date" class="form-control" value="{{ old('prepared_date', $report->prepared_date) }}" required>
        </div>

        <h5 class="mt-4">Reviewed By</h5>
        <div class="mb-3">
            <input type="text" name="reviewed_by_name" class="form-control" placeholder="Name" value="{{ old('reviewed_by_name', $report->reviewed_by_name) }}" required>
        </div>
        <div class="mb-3">
            <input type="text" name="reviewed_by_position" class="form-control" placeholder="Position" value="{{ old('reviewed_by_position', $report->reviewed_by_position) }}" required>
        </div>
        <div class="mb-3">
            <input type="date" name="reviewed_date" class="form-control" value="{{ old('reviewed_date', $report->reviewed_date) }}" required>
        </div>

        <h5 class="mt-4">Approved By</h5>
        <div class="mb-3">
            <input type="text" name="approved_by_name" class="form-control" placeholder="Name" value="{{ old('approved_by_name', $report->approved_by_name) }}" required>
        </div>
        <div class="mb-3">
            <input type="text" name="approved_by_position" class="form-control" placeholder="Position" value="{{ old('approved_by_position', $report->approved_by_position) }}" required>
        </div>
        <div class="mb-3">
            <input type="date" name="approved_date" class="form-control" value="{{ old('approved_date', $report->approved_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Report</button>
        <a href="{{ route('hirarc.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
