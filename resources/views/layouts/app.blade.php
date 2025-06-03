<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>OSHeM - @yield('title', 'HIRARC Report')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">OSHeM Web Portal</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>                    

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="hirarcDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            HIRARC
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="hirarcDropdown">
                            <li><a class="dropdown-item" href="{{ route('hirarc_dummy.form') }}">Create Form</a></li>
                            <li><a class="dropdown-item" href="{{ route('hirarc_dummy.list') }}">List</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="chraDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            CHRA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="chraDropdown">
                            <li><a class="dropdown-item" href="{{ route('chra_dummy.form') }}">Create Form</a></li>
                            <li><a class="dropdown-item" href="{{ route('chra_dummy.list') }}">List</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="nraDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            NRA
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="nraDropdown">
                            <li><a class="dropdown-item" href="#">Create Form</a></li>
                            <li><a class="dropdown-item" href="#">List</a></li>
                        </ul>
                    </li>
                </ul>

                <form method="POST" action="{{ route('logout-org') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
