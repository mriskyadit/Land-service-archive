@extends('layouts.app')

@section('content')
<style>
    .dashboard-image img {
        object-fit: cover;

    }

    /* TOMBOL MONITORING */
    .monitoring-btn {
        min-width: 220px;
        font-weight: 600;
        border-radius: 8px;
        padding: 12px 18px;
    }

    .monitoring-wrapper {
        margin-top: 30px;
    }
</style>

<div class="container-fluid">

    {{-- HERO DASHBOARD --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-0">

            {{-- GAMBAR --}}
            <div class="dashboard-image">
                <img 
                    src="{{ asset('images/bpn-mojokerto.png') }}" 
                    alt="Kantor Pertanahan Kota Mojokerto"
                    class="img-fluid w-100 rounded-top"
                >
            </div>

            {{-- TEKS --}}
            <div class="p-4">
                <h4 class="fw-bold mb-2">
                    Sistem Informasi Layanan & Arsip Pertanahan
                </h4>

                <p class="text-muted mb-3">
                    Kantor Pertanahan Kota Mojokerto
                </p>

                <p class="text-muted">
                    Sistem ini digunakan untuk membantu monitoring dan pengelolaan
                    layanan pertanahan mulai dari proses pengajuan, verifikasi H2P,
                    hingga pengarsipan dokumen secara digital.
                </p>

                {{-- TOMBOL MONITORING --}}
                <div class="monitoring-wrapper d-flex justify-content-center gap-3 flex-wrap">

                    <a href="#" class="btn btn-primary monitoring-btn">
                        👥 Lihat Kinerja Karyawan
                    </a>

                    <a href="#" class="btn btn-success monitoring-btn">
                        📊 History Pelayanan Hari Ini
                    </a>

                    <a href="#" class="btn btn-secondary monitoring-btn">
                        🖨 Print Laporan
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
