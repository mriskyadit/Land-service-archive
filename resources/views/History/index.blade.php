@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Riwayat Perubahan Status Permohonan</h5>

        <a href="{{ route('history.index') }}" class="btn btn-light btn-sm">
            <i class="bi bi-arrow-clockwise"></i> Refresh
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Nama Pemohon</th>
                        <th>Status Lama</th>
                        <th>Status Baru</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($histories as $index => $h)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $h->permohonan->nama_pemohon ?? '-' }}</td>

                        <td>
                            <span class="badge bg-secondary">
                                {{ $h->status_lama ?? '-' }}
                            </span>
                        </td>

                        <td>
                            <span class="badge 
                                @if($h->status_baru == 'Arsip') bg-success 
                                @elseif($h->status_baru == 'H2P') bg-warning text-dark
                                @elseif($h->status_baru == 'Loket') bg-primary 
                                @else bg-dark
                                @endif
                            ">
                                {{ $h->status_baru ?? '-' }}
                            </span>
                        </td>

                        <td>{{ $h->keterangan ?? '-' }}</td>

                        <td>
                            {{ $h->created_at ? $h->created_at->format('d-m-Y H:i') : '-' }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada riwayat perubahan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection
