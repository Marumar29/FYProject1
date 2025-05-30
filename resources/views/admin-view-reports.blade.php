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
        @else
            <div class="alert alert-info">No Reports has been submitted by this organization yet.</div>
        @endif
    </div>
</body>
</html>
