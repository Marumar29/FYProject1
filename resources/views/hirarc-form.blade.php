<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HIRARC Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <a class="navbar-brand" href="{{ route('org.dashboard') }}">OSHeM Web Portal</a>
                <a href="{{ route('org.dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
            </div>
            <form method="POST" action="{{ route('logout-org') }}">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>


    <div class="container mt-4">
        <h2 class="mb-4">HIRARC Assessment Form</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('hirarc.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Task/Activity</label>
                <input type="text" name="task" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Hazard</label>
                <input type="text" name="hazard" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Risk</label>
                <input type="text" name="risk" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Likelihood</label>
                <input type="text" name="likelihood" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Severity</label>
                <input type="text" name="severity" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Risk Rating</label>
                <input type="text" name="risk_rating" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Control Measure</label>
                <textarea name="control_measure" class="form-control" required></textarea>
            </div>

            <hr>
            <h5>Prepared By</h5>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="prepared_by_name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col">
                    <input type="text" name="prepared_by_position" class="form-control" placeholder="Position" required>
                </div>
                <div class="col">
                    <input type="date" name="prepared_date" class="form-control" required>
                </div>
            </div>

            <h5>Reviewed By</h5>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="reviewed_by_name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col">
                    <input type="text" name="reviewed_by_position" class="form-control" placeholder="Position" required>
                </div>
                <div class="col">
                    <input type="date" name="reviewed_date" class="form-control" required>
                </div>
            </div>

            <h5>Approved By</h5>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="approved_by_name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col">
                    <input type="text" name="approved_by_position" class="form-control" placeholder="Position" required>
                </div>
                <div class="col">
                    <input type="date" name="approved_date" class="form-control" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit Report</button>
        </form>
    </div>
</body>
</html>
