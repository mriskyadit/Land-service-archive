<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;

class KinerjaController extends Controller
{
    // halaman utama kinerja
    public function index()
    {
        return view('kepala.kinerja.index');
    }

    // kinerja loket (berkas selesai)
    public function loket()
    {
        $data = Permohonan::where('status', 'selesai')
                    ->orderBy('updated_at', 'desc')
                    ->get();

        return view('kepala.kinerja.loket', compact('data'));
    }

    // kinerja H2P (sedang diproses)
    public function h2p()
    {
        $data = Permohonan::where('status', 'proses_h2p')
                    ->orderBy('updated_at', 'desc')
                    ->get();

        return view('kepala.kinerja.h2p', compact('data'));
    }
}
