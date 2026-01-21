<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }} - Land Archive</title>

    <!-- CSRF FIX WAJIB -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #eef2f7;
            font-family: 'Inter', sans-serif;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #0f172a;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 25px;
            color: white;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar h4 {
            font-weight: 600;
            letter-spacing: .5px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            margin-bottom: 6px;
            border-radius: 8px;
            font-weight: 500;
            transition: .25s;
        }

        .sidebar a:hover {
            background: #1e293b;
            color: #fff;
            transform: translateX(4px);
        }

        .active-menu {
            background: #1e293b !important;
            color: #fff !important;
            box-shadow: inset 0 0 8px rgba(255, 255, 255, 0.05);
        }

        .content {
            margin-left: 260px;
            padding: 30px;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            padding: 18px 22px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.35);
        }

        .navbar-custom h5 {
            font-weight: 600;
            color: #ffffff;
        }

        .navbar-custom span {
            font-weight: 600;
            color: #1e3a8a;
            background: #dbeafe;
            padding: 6px 14px;
            border-radius: 999px;
        }
    </style>
    <style>
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast-custom {
            background: #0f172a;
            color: white;
            padding: 14px 20px;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
            opacity: 0;
            transform: translateX(20px);
            transition: 0.4s;
        }

        .toast-show {
            opacity: 1;
            transform: translateX(0);
        }
    </style>

</head>

<div class="toast-container" id="toastContainer"></div>

<body>

    <div class="sidebar">
        <h4 class="text-center mb-4">Land Service</h4>
        <a href="/permohonan" class="{{ request()->is('permohonan*') ? 'active-menu' : '' }}">📁 Permohonan</a>
        <a href="/history" class="{{ request()->is('history*') ? 'active-menu' : '' }}">📝 History</a>
        <a href="/loket/dashboard" class="{{ request()->is('loket/dashboard') ? 'active-menu' : '' }}">🖥️ Loket Dashboard</a>
        <a href="/h2p/dashboard" class="{{ request()->is('h2p/dashboard') ? 'active-menu' : '' }}">🧩 H2P Dashboard</a>
        <a href="/arsip/dashboard" class="{{ request()->is('arsip/dashboard') ? 'active-menu' : '' }}">🗄️ Arsip Dashboard</a>


        <hr style="border-color: #475569; margin: 18px 0;">

        <!-- Logout (POST) Sudah Benar -->
        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="padding: 0 20px;">
            @csrf
            <button type="submit" class="btn btn-danger w-100 mt-2">
                🚪 Logout
            </button>
        </form>
    </div>

    <div class="content">

        <div class="navbar-custom d-flex justify-content-between align-items-center">
            <h5 class="m-0">{{ $title ?? 'WEB LAND SERVICE & ARCHIVE' }}</h5>

            <div class="d-flex align-items-center gap-3">

                <small class="text-muted d-none d-sm-block" style="font-weight: 500;">
                    <a href="/permohonan/loket" class="text-decoration-none" style="color: #e0e7ff; font-weight: 700;"> Loket
                    </a>
                    &rarr;
                    <a href="/permohonan/h2p" class="text-decoration-none" style="color: #e0e7ff; font-weight: 700;">
                        H2P
                    </a>
                    &rarr;
                    <a href="/history/arsip" class="text-decoration-none" style="color: #e0e7ff; font-weight: 700;">
                        Arsip
                    </a>
                </small>

                <span>Admin</span>
            </div>
        </div>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // auto-hide alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(a => setTimeout(() => a.classList.add('fade'), 3000));
        });
    </script>

    <script>
        function showToast(message, type = 'success') {
            const container = document.getElementById('toastContainer');

            const toast = document.createElement('div');
            toast.classList.add('toast-custom');

            if (type === 'success') toast.style.background = '#059669'; // hijau
            if (type === 'error') toast.style.background = '#dc2626'; // merah
            if (type === 'warning') toast.style.background = '#d97706'; // oranye

            toast.innerText = message;

            container.appendChild(toast);

            // animasi muncul
            setTimeout(() => toast.classList.add('toast-show'), 100);

            // auto hilang
            setTimeout(() => {
                toast.classList.remove('toast-show');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    </script>

    @if(session('success'))
    <script>
        showToast("{{ session('success') }}", "success");
    </script>
    @endif

    @if(session('error'))
    <script>
        showToast("{{ session('error') }}", "error");
    </script>
    @endif


</body>

</html>