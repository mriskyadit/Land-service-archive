@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">

    <h4 class="fw-bold mb-3">📊 History Pelayanan</h4>
    <p class="text-muted mb-4">
        Riwayat pelayanan permohonan yang telah selesai diproses oleh Loket dan H2P
    </p>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Pemohon</th>
                        <th>Jenis Layanan</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($history as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->jenis_layanan ?? '-' }}</td>
                            <td>
                                <span class="badge bg-success">
                                    Selesai
                                </span>
                            </td>
                            <td>{{ $item->updated_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada history pelayanan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
