<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin - Land Service Archive</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #0f172a, #1e293b);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: Arial;
    }

    .login-card {
        width: 380px;
        background: #ffffff;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0px 10px 30px rgba(0,0,0,0.2);
        animation: fadeIn 0.6s ease-in-out;
        position: relative;
    }

    .login-logo {
        width: 120px;
        display: block;
        margin: 0 auto 10px auto;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .title {
        text-align: center;
        font-weight: 700;
        font-size: 22px;
        color: #1e293b;
    }

    .subtitle {
        text-align: center;
        color: #64748b;
        font-size: 13px;
        margin-top: -5px;
        margin-bottom: 15px;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-login {
        background: #0f172a;
        border: none;
        color: white;
        padding: 10px;
        border-radius: 10px;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #1e293b;
    }
</style>
</head>

<body>

<div class="login-card">

<img src="{{ asset('images/logobpn2.png') }}" alt="Logo BPN" class="login-logo">

<p class="title">LAND SERVICE & ARCHIVE</p>
<p class="subtitle">Kantor Pertanahan Kota Mojokerto</p>

@if ($errors->any())
    <div class="alert alert-danger py-2 text-center">
        {{ $errors->first() }}
    </div>
@endif

<form action="{{ route('login.process') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="admin@gmail.com" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
    </div>

    <button type="submit" class="btn-login w-100 mt-2">Masuk</button>
</form>

</div>

</body>
</html>
