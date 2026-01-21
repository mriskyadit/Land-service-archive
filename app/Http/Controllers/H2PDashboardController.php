<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;

class H2PDashboardController extends Controller
{
    public function index()
    {
        $data = Permohonan::where('status', 'H2P')->get();

        return view('h2p.dashboard', [
            'title'     => 'H2P Dashboard',
            'data'      => $data,
            'totalH2P'  => $data->count(),
            'diproses'  => $data->where('status', 'H2P')->count(),
            'selesai'   => $data->where('status', 'Selesai')->count(),
        ]);
    }
}
