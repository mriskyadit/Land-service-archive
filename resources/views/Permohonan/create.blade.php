@extends('layout')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header">
        <h4 class="mb-0">Tambah Permohonan</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('permohonan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Pemohon</label>
                <input type="text" name="nama_pemohon" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Layanan</label>
                <input type="text" name="jenis_layanan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="Loket">Loket</option>
                    <option value="H2P">H2P</option>
                    <option value="Arsip">Arsip</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('permohonan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
