@extends('layouts.app')

@section('content')

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Permohonan</h5>

        <a href="{{ route('permohonan.create') }}" class="btn btn-light btn-sm">
            + Tambah Permohonan
        </a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- SEARCH & FILTER --}}
        <form class="row g-2 mb-3" method="GET" action="{{ route('permohonan.index') }}">
            <div class="col-md-5">
                <input type="search" name="q" value="{{ old('q', $q ?? '') }}" class="form-control" placeholder="Cari nama, layanan, keterangan...">
            </div>

            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">-- Semua Status --</option>
                    @foreach($statuses as $s)
                        <option value="{{ $s }}" {{ (isset($status) && $status == $s) ? 'selected' : '' }}>
                            {{ $s }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Filter</button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('permohonan.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
            </div>
        </form>

        {{-- TABLE --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemohon</th>
                        <th>Jenis Layanan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($data as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->nama_pemohon }}</td>
                        <td>{{ $row->jenis_layanan }}</td>
                        <td>
                            <span class="badge 
                                @if($row->status == 'Arsip') bg-success 
                                @elseif($row->status == 'H2P') bg-warning text-dark
                                @elseif($row->status == 'Loket') bg-primary
                                @else bg-dark
                                @endif
                            ">
                                {{ $row->status }}
                            </span>
                        </td>
                        <td>{{ Str::limit($row->keterangan, 80) }}</td>
                        <td>

                            <a href="{{ route('permohonan.edit', $row->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('permohonan.destroy', $row->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data ini?')">
                                    Hapus
                                </button>
                            </form>

                            {{-- ✅ PERBAIKAN FINAL: KIRIM KE H2P --}}
                            @if($row->status === 'baru')
                            <form action="{{ route('permohonan.kirimH2P', $row->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm"
                                    onclick="return confirm('Kirim permohonan ke H2P?')">
                                    ➡️ Kirim ke H2P
                                </button>
                            </form>
                            @endif
                            {{-- ✅ SELESAI --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada data permohonan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="d-flex justify-content-end">
            {{ $data->links() }}
        </div>

    </div>
</div>

@endsection
