<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>OSHeM Portal - Main</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="text-center bg-white p-5 rounded shadow" style="max-width: 400px; width: 100%;">
        <h1 class="mb-4">OSHeM Web Portal(HIRARC Risk Assessment)</h1>
        <p class="mb-4">Click Login/Register to Continue</p>
        <!-- Login Button triggers modal -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#loginModal">
            Login / Register
        </button>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
          <div class="modal-header">
            <h5 class="modal-title w-100" id="loginModalLabel">Select Login or Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-6 mb-3">
                <h6>Admin</h6>
                <a href="{{ url('login-admin') }}" class="btn btn-primary w-100 mb-2">Login</a>
                <a href="{{ url('register-admin') }}" class="btn btn-outline-primary w-100">Register</a>
              </div>
              <div class="col-6 mb-3">
                <h6>Organization</h6>
                <a href="{{ url('login-org') }}" class="btn btn-secondary w-100 mb-2">Login</a>
                <a href="{{ url('register-org') }}" class="btn btn-outline-secondary w-100">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS & Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
