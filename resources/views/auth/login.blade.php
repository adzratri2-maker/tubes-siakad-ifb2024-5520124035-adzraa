<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }

        [data-theme="light"] {
            --bg: #f8f9fa;
            --card-bg: #ffffff;
            --text: #212529;
            --text-muted: #6c757d;
            --border: #dee2e6;
            --input-bg: #ffffff;
        }
        [data-theme="dark"] {
            --bg: #121212;
            --card-bg: #1e1e1e;
            --text: #e0e0e0;
            --text-muted: #aaaaaa;
            --border: #333333;
            --input-bg: #2a2a2a;
        }

        body {
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-logo .icon {
            width: 56px; height: 56px;
            background: #2c3e50;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 12px;
        }
        .login-logo h4 {
            color: var(--text);
            font-weight: 700;
            margin: 0;
            font-size: 1.3rem;
        }
        .login-logo p {
            color: var(--text-muted);
            font-size: 0.82rem;
            margin: 4px 0 0;
        }
        .form-label {
            color: var(--text);
            font-weight: 500;
            font-size: 0.85rem;
        }
        .form-control {
            background: var(--input-bg);
            border: 1.5px solid var(--border);
            color: var(--text);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.88rem;
        }
        .form-control:focus {
            background: var(--input-bg);
            color: var(--text);
            border-color: #2c3e50;
            box-shadow: 0 0 0 3px rgba(44,62,80,0.12);
        }
        .form-control::placeholder { color: var(--text-muted); }
        .btn-login {
            background: #2c3e50;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-login:hover { background: #34495e; }
        .form-check-label { color: var(--text-muted); font-size: 0.82rem; }
        .invalid-feedback { font-size: 0.78rem; }
        .theme-btn {
            position: fixed;
            top: 16px; right: 16px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            color: var(--text-muted);
            width: 36px; height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<button class="theme-btn" onclick="toggleTheme()">
    <i id="theme-icon" class="fas fa-moon"></i>
</button>

<div class="login-card">
    <div class="login-logo">
        <div class="icon"><i class="fas fa-graduation-cap"></i></div>
        <h4>SIAKAD</h4>
        <p>Sistem Informasi Akademik</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="Masukkan email" autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Masukkan password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
        </div>
        <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt me-2"></i> Login
        </button>
    </form>
</div>

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