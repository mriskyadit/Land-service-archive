@extends('layouts.app')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Total Masuk H2P</h6>
                <h3 class="fw-bold">{{ $totalH2P ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Sedang Diproses</h6>
                <h3 class="fw-bold text-warning">{{ $diproses ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Selesai H2P</h6>
                <h3 class="fw-bold text-success">{{ $selesai ?? 0 }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-header bg-white fw-semibold d-flex justify-content-between align-items-center">
        <span>Monitoring Pemrosesan H2P</span>

        <!-- TOMBOL BARU -->
        <a href="{{ route('h2p.ambil-arsip') }}" class="btn btn-sm btn-success">
            Ambil Data Arsip
        </a>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pemohon</th>
                    <th>Jenis Layanan</th>
                    <th>Warkah</th>
                    <th>Buku Tanah</th>
                    <th>Surat Ukur</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pemohon }}</td>
                    <td>{{ $item->jenis_layanan }}</td>

                    <td>
                        <span class="badge {{ $item->warkah ? 'bg-success' : 'bg-secondary' }}">
                            {{ $item->warkah ? 'Update' : 'Belum' }}
                        </span>
                    </td>

                    <td>
                        <span class="badge {{ $item->buku_tanah ? 'bg-success' : 'bg-secondary' }}">
                            {{ $item->buku_tanah ? 'Update' : 'Belum' }}
                        </span>
                    </td>

                    <td>
                        <span class="badge {{ $item->surat_ukur ? 'bg-success' : 'bg-secondary' }}">
                            {{ $item->surat_ukur ? 'Update' : 'Belum' }}
                        </span>
                    </td>

                    <td>
                        <span class="badge bg-warning">
                            {{ $item->status }}
                        </span>
                    </td>

                    <td class="d-flex gap-1">
                        <a href="{{ route('h2p.proses', $item->id) }}" class="btn btn-sm btn-warning">
    Proses
</a>
                        <form action="{{ route('arsip.request', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-warning">
                                Ajukan Arsip
                            </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">
                        Belum ada data H2P
                    </td>
                </tr>


                @endforelse
            </tbody>
            
        </table>
    </div>
</div>
@endsection