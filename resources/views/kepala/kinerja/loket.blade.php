<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kinerja Loket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
        }

        .page-title {
            font-weight: 700;
            color: #0f172a;
        }

        .subtitle {
            font-size: .9rem;
            color: #64748b;
        }

        .card {
            border-radius: 14px;
        }

        .badge-status {
            font-size: .75rem;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .table thead {
            background-color: #f1f5f9;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fafc;
        }
    </style>
</head>

<body>

<div class="container-fluid p-4">

    {{-- HEADER --}}
    <div class="mb-4">
        <h4 class="page-title">📌 Monitoring Kinerja Loket</h4>
        <p class="subtitle">
            Menampilkan daftar permohonan yang telah diproses oleh petugas loket.
            Halaman ini bersifat monitoring (read-only).
        </p>
    </div>

    {{-- CARD --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Jenis Proses</th>
                            <th>Status</th>
                            <th>Tanggal Masuk</th>
                            <th>Update Terakhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_pemohon }}</td>
                                <td>{{ $item->jenis_proses ?? '-' }}</td>
                                <td>
                                    @if ($item->status == 'Selesai')
                                        <span class="badge bg-success badge-status">
                                            ✔ Selesai
                                        </span>
                                    @else
                                        <span class="badge bg-warning text-dark badge-status">
                                            ⏳ Diproses Loket
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->created_at?->format('d M Y') }}
                                </td>
                                <td>
                                    {{ $item->updated_at?->format('d M Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Belum ada data kinerja loket
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    {{-- TOMBOL KEMBALI --}}
    <div class="mt-4">
        <a href="{{ route('kepala.monitoring') }}" class="btn btn-secondary btn-sm">
            ← Kembali ke Dashboard Monitoring
        </a>
    </div>

</div>

</body>
</html>
