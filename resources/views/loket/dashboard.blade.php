<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Loket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-main {
            border-radius: 20px;
            animation: fadeUp .6s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .box {
            border-radius: 16px;
            padding: 24px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .box-click {
            transition: .3s;
        }

        .box-click:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0,0,0,.3);
        }

        .icon {
            font-size: 38px;
            opacity: .9;
        }

        .box-total {
            background: linear-gradient(135deg, #4e73df, #224abe);
        }

        .box-permohonan {
            background: linear-gradient(135deg, #1cc88a, #13855c);
        }

        .box-selesai {
            background: linear-gradient(135deg, #f6c23e, #da9f17);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card card-main shadow-lg border-0">
        <div class="card-body p-5">

            <h3 class="fw-bold text-center mb-1">Dashboard Loket</h3>
            <p class="text-muted text-center mb-4">
                Halaman Pelayanan Petugas Loket
            </p>

            {{-- BOX TOTAL ANTRIAN --}}
            <div class="row mb-4 justify-content-center">
                <div class="col-md-8">
                    <div class="box box-total text-center">
                        <div class="icon mb-2">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h5 class="fw-bold">Total Antrian</h5>
                        <h2 class="fw-bold mt-2">
                            {{ $totalAntrian ?? 0 }}
                        </h2>
                        <small>Permohonan masuk ke loket</small>
                    </div>
                </div>
            </div>

            {{-- BOX BAWAH --}}
            <div class="row g-4">

                {{-- PERMOHONAN --}}
                <div class="col-md-6">
                    <a href="{{ route('permohonan.index') }}" class="text-decoration-none">
                        <div class="box box-click box-permohonan h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon">
                                    <i class="bi bi-file-earmark-text-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Permohonan</h5>
                                    <small>Kelola data permohonan</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                {{-- SUDAH DILAYANI --}}
                <div class="col-md-6">
                    <a href="{{ route('loket.selesai') }}" class="text-decoration-none">
                        <div class="box box-click box-selesai h-100">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1">Sudah Dilayani</h5>
                                    <small>Permohonan dari H2P</small>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            {{-- LOGOUT --}}
            <div class="text-center mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
