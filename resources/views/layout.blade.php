<!DOCTYPE html>
<html>

<head>
    <title>Land Service & Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('permohonan.index') }}">
                Land Service & Digital Archive
            </a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // auto-hide alerts
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(a => setTimeout(() => a.classList.add('fade'), 3000));
        });
    </script>
</body>

</html>