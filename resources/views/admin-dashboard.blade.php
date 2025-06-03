@extends('layouts.adminapp')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Welcome, Admin</h2>
            <form method="POST" action="{{ route('logout-admin') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-4">
            <div class="row g-2 align-items-end">
                <div class="col-md-4">
                    <label for="org_type" class="form-label">Filter by Organization Type:</label>
                    <select name="org_type" id="org_type" class="form-select">
                        <option value="">All</option>
                        <option value="Manufacturing" {{ request('org_type') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                        <option value="Construction" {{ request('org_type') == 'Construction' ? 'selected' : '' }}>Construction</option>
                        <option value="Healthcare" {{ request('org_type') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                        <option value="Education" {{ request('org_type') == 'Education' ? 'selected' : '' }}>Education</option>
                        <option value="Logistics" {{ request('org_type') == 'Logistics' ? 'selected' : '' }}>Logistics</option>
                        <option value="Retail" {{ request('org_type') == 'Retail' ? 'selected' : '' }}>Retail</option>
                        <option value="Other" {{ request('org_type') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="module_type" class="form-label">Filter by Module:</label>
                    <select name="module_type" id="module_type" class="form-select">
                        <option value="">All Modules</option>
                        <option value="hirarc" {{ request('module_type') == 'hirarc' ? 'selected' : '' }}>HIRARC</option>
                        <option value="chra" {{ request('module_type') == 'chra' ? 'selected' : '' }}>CHRA</option>
                        <option value="nra" {{ request('module_type') == 'nra' ? 'selected' : '' }}>NRA</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="search" class="form-label">Search by Org Name / Reg. No:</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control" placeholder="Enter search term" />
                </div>

                <div class="col-md-auto">
                    <button type="submit" class="btn btn-primary">Apply Filter</button>
                </div>
            </div>
        </form>

        @if(count($organizations) > 0)
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Organization Name</th>
                        <th>Email</th>
                        <th>Registration Number</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organizations as $org)
                    <tr>
                        <td>{{ $org->org_name }}</td>
                        <td>{{ $org->org_email }}</td>
                        <!-- Add this inside the row -->
                        <td>
                            <form action="{{ route('admin.viewReports', ['id' => $org->id]) }}" method="GET" class="d-flex">
                                <select name="module" class="form-select form-select-sm me-2">
                                    <option value="hirarc">HIRARC</option>
                                    <option value="chra">CHRA</option>
                                    <option value="nra">NRA</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-outline-primary">View Reports</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="alert alert-info">No organizations found for the selected criteria.</div>
        @endif
    </div>
</body>
</html>
@endsection