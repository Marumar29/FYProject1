<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Organization Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand text-white">OSHeM Web Portal</span>
        </div>
    </nav>

    <div class="container" style="max-width: 400px;">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4 text-center">Organization Registration</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('register-org.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="org_name" class="form-label">Organization Name</label>
                        <input type="text" class="form-control" id="org_name" name="org_name" required />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Organization Email</label>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>

                    <div class="mb-3">
                        <label for="registration_number" class="form-label">Registration Number</label>
                        <input type="text" class="form-control" id="registration_number" name="registration_number" required />
                    </div>

                    <div class="mb-3">
                        <label for="org_type" class="form-label">Organization Type</label>
                        <select class="form-select" id="org_type" name="org_type" required>
                            <option value="" disabled selected>Select organization type</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Construction">Construction</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Education">Education</option>
                            <option value="Logistics">Logistics</option>
                            <option value="Retail">Retail</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required />
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required />
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Register</button>

                    <a href="{{ route('login-org') }}" class="btn btn-link mt-3 d-block text-center">Already have an account? Login</a>
                    <a href="{{ route('main.page') }}" class="btn btn-secondary mt-2 w-100">Return to Main Page</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
