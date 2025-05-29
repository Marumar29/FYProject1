<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organization Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand text-white">OSHeM Web Portal</span>
            <form method="POST" action="{{ route('logout-org') }}">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Welcome, {{ session('org_name') }}</h2>
        <p>Select an assessment module below:</p>

        <div class="list-group">
            <a href="{{ route('hirarc.create') }}" class="list-group-item list-group-item-action">📋 HIRARC Module</a>
            <a href="#" class="list-group-item list-group-item-action disabled">🧪 CHRA Module (Coming Soon)</a>
            <a href="#" class="list-group-item list-group-item-action disabled">📊 NRA Module (Coming Soon)</a>
        </div>
    </div>
</body>
</html>
