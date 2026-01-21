@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="fw-bold mb-3">Monitoring Pemrosesan H2P</h5>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemohon</th>
                <th>Jenis Proses</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_pemohon }}</td>
                <td>{{ $item->jenis_proses }}</td>
                <td>
                    <span class="badge bg-warning">Diproses</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
