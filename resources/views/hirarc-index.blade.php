<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HIRARC Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand text-white">OSHeM Web Portal - HIRARC Reports</span>
            <form method="POST" action="{{ route('logout-org') }}">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>HIRARC Reports</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('hirarc.create') }}" class="btn btn-primary mb-3">Create New Report</a>

        @if($reports->isEmpty())
            <p>No reports found.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Hazard</th>
                        <th>Likelihood</th>
                        <th>Severity</th>
                        <th>Risk Rating (RPN)</th>
                        <th>Significant</th>
                        <th>Control Measure</th>
                        <th>Remarks</th>
                        <th>Prepared By</th>
                        <th>Reviewed By</th>
                        <th>Approved By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
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
                                <td>
                                    <a href="{{ route('hirarc.edit', $report->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form action="{{ route('hirarc.destroy', $report->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this report?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table>
        @endif

        <a href="{{ route('org.dashboard') }}" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
