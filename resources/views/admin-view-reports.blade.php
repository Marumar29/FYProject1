<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $organization->org_name }} - Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3>{{ $organization->org_name }} - HIRARC Reports</h3>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary my-3">← Back to Dashboard</a>

        @if ($reports->count() > 0)
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Activity</th>
                        <th>Hazard</th>
                        <th>Risk</th>
                        <th>Likelihood</th>
                        <th>Severity</th>
                        <th>Risk Rating</th>
                        <th>Controls</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->activity }}</td>
                            <td>{{ $report->hazard }}</td>
                            <td>{{ $report->risk }}</td>
                            <td>{{ $report->likelihood }}</td>
                            <td>{{ $report->severity }}</td>
                            <td>{{ $report->risk_rating }}</td>
                            <td>{{ $report->control_measures }}</td>
                            <td>{{ $report->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">No HIRARC reports submitted by this organization yet.</div>
        @endif
    </div>
</body>
</html>
