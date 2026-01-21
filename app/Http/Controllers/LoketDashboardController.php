<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;

class LoketDashboardController extends Controller
{
    public function index()
    {
        // Total permohonan yang masuk ke loket
        $totalAntrian = Permohonan::where('status', 'Diproses Loket')->count();

        return view('loket.dashboard', compact('totalAntrian'));
    }

    public function selesai()
    {
        // NANTI: permohonan yang sudah dilayani
        $data = Permohonan::where('status', 'Selesai')->get();

        return view('loket.selesai', compact('data'));
    }
}
