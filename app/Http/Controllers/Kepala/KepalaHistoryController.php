<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;

class HistoryController extends Controller
{
    public function index()
    {
        // ambil data yang sudah selesai dilayani
        $history = Permohonan::whereIn('status', [
            'selesai_loket',
            'selesai_h2p'
        ])->latest()->get();

        return view('kepala.history.index', compact('history'));
    }
}
