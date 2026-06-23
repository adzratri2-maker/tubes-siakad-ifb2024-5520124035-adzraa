<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }

        [data-theme="light"] {
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
            --sidebar-active: #1a252f;
            --sidebar-text: #ecf0f1;
            --sidebar-muted: rgba(255,255,255,0.5);
            --body-bg: #f8f9fa;
            --card-bg: #ffffff;
            --text: #212529;
            --text-muted: #6c757d;
            --border: #dee2e6;
            --navbar-bg: #ffffff;
            --table-head: #343a40;
        }
        [data-theme="dark"] {
            --sidebar-bg: #1a1a2e;
            --sidebar-hover: #16213e;
            --sidebar-active: #0f3460;
            --sidebar-text: #e0e0e0;
            --sidebar-muted: rgba(255,255,255,0.4);
            --body-bg: #121212;
            --card-bg: #1e1e1e;
            --text: #e0e0e0;
            --text-muted: #aaaaaa;
            --border: #333333;
            --navbar-bg: #1e1e1e;
            --table-head: #0f3460;
        }

        body { background-color: var(--body-bg); color: var(--text); transition: all 0.3s; }
        .sidebar {
            min-height: 100vh;
            background: var(--sidebar-bg);
            width: 250px;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            transition: all 0.3s;
        }
        .sidebar h5 { color: var(--sidebar-text); padding: 20px 16px 10px; font-weight: 600; font-size: 1rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar .nav-link {
            color: var(--sidebar-text);
            padding: 10px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.88rem;
            transition: all 0.2s;
        }
        .sidebar .nav-link:hover { background: var(--sidebar-hover); }
        .sidebar .nav-link.active { background: var(--sidebar-active); font-weight: 600; }
        .sidebar .nav-link i { width: 18px; text-align: center; }
        .sidebar-section {
            padding: 12px 16px 4px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--sidebar-muted);
            font-weight: 600;
        }
        .sidebar-logout { border-top: 1px solid rgba(255,255,255,0.1); margin-top: 16px; padding-top: 8px; }
        .sidebar-logout .nav-link { color: #e74c3c !important; }
        .sidebar-logout .nav-link:hover { background: rgba(231,76,60,0.15); }

        .main-wrapper { margin-left: 250px; }
        .topnav {
            background: var(--navbar-bg);
            padding: 12px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 99;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }
        .topnav-title { font-weight: 600; color: var(--text); font-size: 0.95rem; margin: 0; }
        .topnav-right { display: flex; align-items: center; gap: 12px; }
        .user-info { font-size: 0.82rem; color: var(--text-muted); }
        .user-info strong { color: var(--text); }
        .theme-toggle {
            background: none;
            border: 1px solid var(--border);
            color: var(--text-muted);
            width: 32px; height: 32px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            transition: all 0.2s;
        }
        .theme-toggle:hover { background: var(--sidebar-bg); color: #fff; border-color: var(--sidebar-bg); }

        .content-area { padding: 24px; }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .card-header {
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            padding: 14px 20px;
            font-weight: 600;
            color: var(--text);
            border-radius: 10px 10px 0 0 !important;
        }
        .card-body { padding: 20px; }

        .table { color: var(--text); }
        .table thead th {
            background: var(--table-head);
            color: #fff;
            font-weight: 600;
            font-size: 0.82rem;
            border: none;
            padding: 12px 16px;
        }
        .table tbody td { padding: 11px 16px; vertical-align: middle; font-size: 0.86rem; border-color: var(--border); color: var(--text); }
        .table tbody tr:hover td { background: rgba(0,0,0,0.03); }
        [data-theme="dark"] .table tbody td { background: var(--card-bg); }
        [data-theme="dark"] .table tbody tr:hover td { background: rgba(255,255,255,0.04); }

        .btn { border-radius: 6px; font-size: 0.83rem; font-weight: 500; }
        .form-control, .form-select {
            background: var(--card-bg);
            border: 1px solid var(--border);
            color: var(--text);
            border-radius: 8px;
            font-size: 0.86rem;
        }
        .form-control::placeholder { color: var(--text-muted); }
        .form-control:focus, .form-select:focus {
            background: var(--card-bg);
            color: var(--text);
            border-color: #2c3e50;
            box-shadow: 0 0 0 2px rgba(44,62,80,0.15);
        }
        [data-theme="dark"] .form-control:focus, [data-theme="dark"] .form-select:focus {
            border-color: #0f3460;
            box-shadow: 0 0 0 2px rgba(15,52,96,0.3);
        }
        .form-label { font-weight: 600; font-size: 0.83rem; color: var(--text-muted); }
        .alert { border-radius: 8px; border: none; font-size: 0.86rem; }
    </style>
</head>
<body>

<div class="sidebar">
    <h5><i class="fas fa-graduation-cap me-2"></i>SIAKAD</h5>

    <div class="sidebar-section">Navigasi</div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        @if(auth()->check() && auth()->user()->isAdmin())
        <li class="nav-item">
            <a href="{{ route('dosen.index') }}" class="nav-link {{ request()->routeIs('dosen.*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher"></i> Dosen
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mahasiswa.index') }}" class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                <i class="fas fa-user-graduate"></i> Mahasiswa
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('matakuliah.index') }}" class="nav-link {{ request()->routeIs('matakuliah.*') ? 'active' : '' }}">
                <i class="fas fa-book"></i> Mata Kuliah
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('jadwal.index') }}" class="nav-link {{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i> Jadwal
            </a>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ route('krs.index') }}" class="nav-link {{ request()->routeIs('krs.*') ? 'active' : '' }}">
                <i class="fas fa-list-alt"></i> KRS Saya
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('jadwal.index') }}" class="nav-link {{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i> Jadwal
            </a>
        </li>
        @endif

        <div class="sidebar-logout">
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </ul>
</div>

<div class="main-wrapper">
    <div class="topnav">
        <h6 class="topnav-title">@yield('title')</h6>
        <div class="topnav-right">
            <button class="theme-toggle" onclick="toggleTheme()" title="Toggle Dark Mode">
                <i id="theme-icon" class="fas fa-moon"></i>
            </button>
            @if(auth()->check())
            <a href="{{ route('profil.edit') }}" style="text-decoration:none;">
    <div class="user-info d-flex align-items-center gap-2">
        @if(auth()->user()->foto)
            <img src="{{ asset('storage/' . auth()->user()->foto) }}" 
                 style="width:28px; height:28px; border-radius:50%; object-fit:cover;">
        @else
            <div style="width:28px; height:28px; border-radius:50%; background:#2c3e50; display:inline-flex; align-items:center; justify-content:center; font-size:0.75rem; color:white;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
        @endif
        <strong style="color:var(--text);">{{ auth()->user()->name }}</strong>
        <span style="color:var(--text-muted);">({{ ucfirst(auth()->user()->role) }})</span>
    </div>
</a>
            @endif
        </div>
    </div>

    <div class="content-area">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleTheme() {
        const html = document.documentElement;
        const icon = document.getElementById('theme-icon');
        const isDark = html.getAttribute('data-theme') === 'dark';
        html.setAttribute('data-theme', isDark ? 'light' : 'dark');
        icon.className = isDark ? 'fas fa-moon' : 'fas fa-sun';
        localStorage.setItem('theme', isDark ? 'light' : 'dark');
    }
    const saved = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', saved);
    document.getElementById('theme-icon').className = saved === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
</script>
</body>
</html>