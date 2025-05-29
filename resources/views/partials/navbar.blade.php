<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('main.page') }}">OSHeM Web Portal</a>
        <form method="POST" action="{{ session('user_type') === 'admin' ? route('admin.logout') : route('logout-org') }}">
            @csrf
            <button type="submit" class="btn btn-light btn-sm">Logout</button>
        </form>

    </div>
</nav>
