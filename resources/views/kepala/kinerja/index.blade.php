<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kinerja Karyawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc;
        }

        .page-title {
            font-weight: 700;
            color: #0f172a;
        }

        .kinerja-card {
            border-radius: 18px;
            padding: 30px;
            background: white;
            transition: all .3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,.05);
            height: 100%;
        }

        .kinerja-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0,0,0,.12);
        }

        .kinerja-icon {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .kinerja-title {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .kinerja-desc {
            font-size: .9rem;
            color: #64748b;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="mb-4">
        <h4 class="page-title">👥 Kinerja Karyawan</h4>
        <p class="text-muted">
            Monitoring kinerja petugas berdasarkan unit pelayanan
        </p>
    </div>

    <div class="row g-4">

        {{-- KINERJA LOKET --}}
        <div class="col-md-6">
            <a href="{{ route('kepala.kinerja.loket') }}" class="text-decoration-none text-dark">
                <div class="kinerja-card text-center">
                    <div class="kinerja-icon">🏢</div>
                    <div class="kinerja-title">Kinerja Loket</div>
                    <div class="kinerja-desc">
                        Monitoring permohonan yang telah diproses oleh petugas loket
                    </div>
                </div>
            </a>
        </div>

        {{-- KINERJA H2P --}}
        <div class="col-md-6">
            <a href="{{ route('kepala.kinerja.h2p') }}" class="text-decoration-none text-dark">
                <div class="kinerja-card text-center">
                    <div class="kinerja-icon">📂</div>
                    <div class="kinerja-title">Kinerja H2P</div>
                    <div class="kinerja-desc">
                        Monitoring proses berkas H2P oleh petugas teknis
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div class="mt-5">
        <a href="{{ route('kepala.monitoring') }}" class="btn btn-secondary btn-sm">
            ← Kembali ke Dashboard
        </a>
    </div>

</div>

</body>
</html>
