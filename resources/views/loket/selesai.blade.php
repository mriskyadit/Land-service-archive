<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Permohonan Selesai - Loket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            padding: 40px;
        }

        .card {
            border-radius: 16px;
            animation: fadeUp .5s ease;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table th {
            background: #1e293b;
            color: #fff;
            white-space: nowrap;
        }

        .badge-selesai {
            background: #1cc88a;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="card shadow-lg border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Permohonan Selesai</h4>
                    <p class="text-muted mb-0">
                        Daftar permohonan yang telah dilayani oleh Loket
                    </p>
                </div>

                <a href="{{ route('loket.dashboard') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Layanan</th>
                            <th>Jenis Proses</th>
                            <th>Status</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pemohon ?? '-' }}</td>
                                <td>{{ $item->jenis_layanan ?? '-' }}</td>
                                <td>{{ $item->jenis_proses ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-selesai">
                                        Selesai
                                    </span>
                                </td>
                                <td>
                                    {{ $item->updated_at->format('d-m-Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada permohonan yang selesai
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
