@extends('layouts.app')
@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Proses Berkas H2P</h5>
    </div>

    <div class="card-body">
        <p><strong>Nama Pemohon:</strong> {{ $permohonan->nama_pemohon }}</p>

        <form action="{{ route('h2p.kirim-loket', $permohonan->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Jenis Proses</label>
                <select name="jenis_proses" class="form-select" required>
                    <option value="">-- Pilih Proses --</option>
                    <option value="Balik Nama">Balik Nama</option>
                    <option value="PH">PH</option>
                    <option value="HGB-HM">HGB → HM</option>
                </select>
            </div>

            <button class="btn btn-success">
                Kirim ke Loket
            </button>

            <a href="{{ route('h2p.dashboard') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>

@endsection
