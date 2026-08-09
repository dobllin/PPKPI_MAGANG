<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Super Admin') - SIMPEL PPKPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { background:#f4f6f9; }
        .sidebar { min-height: 100vh; background: #1e2a38; width: 240px; }
        .sidebar a { color: #c9d3dc; text-decoration: none; display: block; padding: .65rem 1.25rem; font-size: .93rem; }
        .sidebar a:hover, .sidebar a.active { background: #2c3e50; color: #fff; }
        .sidebar .brand { color: #fff; font-weight: 600; padding: 1rem 1.25rem; border-bottom: 1px solid #2c3e50; }
        .main-content { flex: 1; }
        .topbar { background: #fff; border-bottom: 1px solid #e3e6ea; }
        .card-stat h3 { font-weight: 700; }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <div class="brand"><i class="bi bi-shield-lock me-1"></i> SIMPEL PPKPI</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <hr class="text-secondary mx-3">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-danger w-100 text-start" style="padding: .65rem 1.25rem; text-decoration:none;">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
        </form>
    </div>

    <div class="main-content">
        <nav class="topbar d-flex justify-content-between align-items-center px-4 py-3">
            <h5 class="mb-0">@yield('title', 'Dashboard')</h5>
            <span class="text-muted small">
                <i class="bi bi-person-circle me-1"></i> {{ auth()->user()->nama_lengkap ?? 'Admin' }}
            </span>
        </nav>

        <div class="p-4">
            @if (session('success'))
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

            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>