@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Permohonan</h4>
    </div>
    <div class="card-body">

        <form action="{{ route('permohonan.update', $permohonan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Pemohon</label>
                <input type="text" name="nama_pemohon" class="form-control"
                       value="{{ $permohonan->nama_pemohon }}" required>
            </div>

            <div class="mb-3">
                <label>Jenis Layanan</label>
                <input type="text" name="jenis_layanan" class="form-control"
                       value="{{ $permohonan->jenis_layanan }}" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="Loket" {{ $permohonan->status == 'Loket' ? 'selected' : '' }}>Loket</option>
                    <option value="H2P" {{ $permohonan->status == 'H2P' ? 'selected' : '' }}>H2P</option>
                    <option value="Arsip" {{ $permohonan->status == 'Arsip' ? 'selected' : '' }}>Arsip</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control">{{ $permohonan->keterangan }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('permohonan.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>
</div>
@endsection
