<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organization Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand text-white">OSHeM Web Portal</span>
        </div>
    </nav>


    <div class="container" style="max-width: 400px;">
        <h2 class="mb-4">Organization Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login-org.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Organization Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            <a href="{{ route('register-org') }}" class="btn btn-link mt-3 d-block text-center">Don't have an account? Register</a>
            <a href="{{ route('main.page') }}" class="btn btn-secondary mt-2 w-100">Return to Main Page</a>
        </form>
    </div>
</body>
</html>
