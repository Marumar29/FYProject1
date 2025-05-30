<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organization Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* Show dropdown menu on hover */
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        /* Remove caret from dropdown toggles */
        .dropdown-toggle::after {
            display: none;
        }
        /* Dropdown menu hidden by default */
        .dropdown-menu {
            display: none;
            position: absolute;
            width: 100%; /* Make dropdown full width under button */
            left: 0;
            z-index: 1000;
        }
        /* Position dropdown relative inside container */
        .list-group .dropdown {
            position: relative;
        }

        /* Style module bars as buttons */
        .module-bar {
            display: block;
            width: 100%;
            text-align: left;
            padding: 10px 20px;
            margin-bottom: 0.5rem;
            color: #0d6efd; /* Bootstrap primary color */
            border: 1px solid #0d6efd;
            border-radius: 0.375rem; /* same as btn */
            background-color: #fff;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
        }
        /* Hover effect for module bars */
        .module-bar:hover:not(.disabled) {
            background-color: #0d6efd;
            color: #fff;
            text-decoration: none;
        }
        /* Disabled style */
        .module-bar.disabled {
            color: #6c757d;
            border-color: #6c757d;
            cursor: not-allowed;
            background-color: #e9ecef;
        }
        /* Dropdown menu items width */
        .dropdown-menu .dropdown-item {
            width: 100%;
        }
    </style>
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
        <p>Select an <strong>Risk Assessment Cloud System</strong> module below:</p>

        <div class="list-group">
            <div class="dropdown">
                <a href="#" class="module-bar">📋 Hazard Identification, Risk Assessment, and Risk Control (HIRARC)</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('hirarc.create') }}">HIRARC Form Create</a></li>
                    <li><a class="dropdown-item" href="{{ route('hirarc.index') }}">HIRARC Form View</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="module-bar">🧪 Chemical Health Risk Assessment (CHRA)</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('hirarc.create') }}">CHRA Form Create</a></li>
                    <li><a class="dropdown-item" href="{{ route('hirarc.index') }}">CHRA Form View</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <a href="#" class="module-bar">📊 Noise Risk Assessment (NRA)</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('hirarc.create') }}">NRA Form Create</a></li>
                    <li><a class="dropdown-item" href="{{ route('hirarc.index') }}">NRA Form View</a></li>
                </ul>
            </div>     
        </div>
    </div>

</body>
</html>
