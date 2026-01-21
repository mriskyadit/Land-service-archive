@extends('layouts.app')
@section('content')

<style>
    /* ===== TOMBOL ARSIP FORMAL ===== */
    .arsip-btn {
        border-radius: 14px;
        transition: all .3s ease;
        background: linear-gradient(135deg, #0d6efd, #0b5ed7);
        color: #fff;
        cursor: pointer;
    }

    .arsip-btn:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 28px rgba(13, 110, 253, .35);
        background: linear-gradient(135deg, #0b5ed7, #084298);
    }

    .arsip-btn .card-body {
        padding: 30px 20px;
    }

    .arsip-btn i {
        font-size: 36px;
        margin-bottom: 10px;
        display: block;
        opacity: .9;
    }

    .arsip-btn p {
        color: rgba(255, 255, 255, .85);
        font-size: 14px;
    }

    .arsip-btn.active {
        outline: 3px solid rgba(13, 110, 253, .25);
        box-shadow: 0 16px 30px rgba(13, 110, 253, .45);
    }
</style>

@php
$jenis = request('jenis');
@endphp

{{-- TOMBOL JENIS ARSIP --}}
<div class="row mb-4">

    <div class="col-md-4">
        <a href="{{ url('/arsip/dashboard?jenis=warkah') }}" class="text-decoration-none">
            <div class="card arsip-btn text-center {{ $jenis=='warkah' ? 'active' : '' }}">
                <div class="card-body">
                    <i class="bi bi-folder2-open"></i>
                    <h5 class="fw-bold mb-1">Warkah</h5>
                    <p class="mb-0">Arsip Warkah Pertanahan</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ url('/arsip/dashboard?jenis=buku_tanah') }}" class="text-decoration-none">
            <div class="card arsip-btn text-center {{ $jenis=='buku_tanah' ? 'active' : '' }}">
                <div class="card-body">
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <h5 class="fw-bold mb-1">Buku Tanah</h5>
                    <p class="mb-0">Data Buku Tanah</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="{{ url('/arsip/dashboard?jenis=surat_ukur') }}" class="text-decoration-none">
            <div class="card arsip-btn text-center {{ $jenis=='surat_ukur' ? 'active' : '' }}">
                <div class="card-body">
                    <i class="bi bi-map-fill"></i>
                    <h5 class="fw-bold mb-1">Surat Ukur</h5>
                    <p class="mb-0">Dokumen Surat Ukur</p>
                </div>
            </div>
        </a>
    </div>

</div>

{{-- TABEL ARSIP --}}
<div class="card shadow-sm">
    <div class="card-body">

        {{-- JUDUL + TOMBOL TAMBAH --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-semibold mb-0">
                @if($jenis == 'warkah')
                Daftar Warkah
                @elseif($jenis == 'buku_tanah')
                Daftar Buku Tanah
                @elseif($jenis == 'surat_ukur')
                Daftar Surat Ukur
                @else
                Daftar Arsip
                @endif
            </h5>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahArsip">
                <i class="bi bi-plus-circle"></i> Tambah Arsip
            </button>
        </div>

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>No Arsip</th>
                    <th>Nama Pemohon</th>
                    <th>Jenis Arsip</th>
                    <th>Status</th>
                    <th width="180">Aksi Arsip</th> {{-- ✅ TAMBAHAN --}}
                </tr>
            </thead>
            <tbody>

                {{-- CONTOH DATA PERMINTAAN H2P (AMAN, BISA DIHAPUS NANTI) --}}
                @isset($data)
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_arsip ?? '-' }}</td>
                    <td>{{ $item->nama_pemohon }}</td>
                    <td>{{ ucfirst(str_replace('_',' ',$item->jenis_arsip ?? '-')) }}</td>
                    <td>
                        <span class="badge bg-warning">{{ $item->status }}</span>
                    </td>
                    <td>

                        {{-- === KODE IZINKAN / TOLAK (PUNYA KAMU) === --}}
                        @if($item->status == 'Menunggu Arsip')
                        <form action="{{ route('arsip.izinkan', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-success">
                                Izinkan
                            </button>
                        </form>

                        <form action="{{ route('arsip.tolak', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-danger">
                                Tolak
                            </button>
                        </form>

                        @elseif($item->status == 'Disetujui Arsip')
                        <span class="badge bg-success">Disetujui</span>

                        @elseif($item->status == 'Ditolak Arsip')
                        <span class="badge bg-danger">Ditolak</span>
                        @endif

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">
                        Belum ada permintaan arsip dari H2P
                    </td>
                </tr>
                @endisset

            </tbody>
        </table>

    </div>
</div>

{{-- MODAL TAMBAH ARSIP --}}
<div class="modal fade" id="modalTambahArsip" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ ('arsip.simpan') }}" method="POST">
                @csrf
                route
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Arsip</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Jenis Arsip</label>
                        <select class="form-select" name="jenis_arsip">
                            <option value="">-- Pilih Jenis Arsip --</option>
                            <option value="warkah">Warkah</option>
                            <option value="buku_tanah">Buku Tanah</option>
                            <option value="surat_ukur">Surat Ukur</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Arsip</label>
                        <input type="text" class="form-control" name="no_arsip" class="form-control" placeholder="Contoh: ARS-001" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Pemohon</label>
                        <input type="text" class="form-control" name="nama_pemohon">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Arsip</label>
                        <select class="form-select" name="status">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Diproses">Diproses</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">
                        Simpan Arsip
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


@endsection