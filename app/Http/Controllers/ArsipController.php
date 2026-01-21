<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Models\Arsip;

class ArsipController extends Controller
{
    public function dashboard(Request $request)
    {
        $jenis = $request->jenis;

        $query = Permohonan::where('status', 'Menunggu Arsip');

        if ($jenis) {
            $query->where('jenis_layanan', 'like', "%$jenis%");
        }

        $data = $query->latest()->get();

        return view('arsip.dashboard', compact('data', 'jenis'));
    }
    public function simpan(Request $request)
    {
        $request->validate([
            'jenis_arsip'   => 'required',
            'no_arsip'      => 'required',
            'nama_pemohon'  => 'required',
            'status'        => 'required'
        ]);

        Arsip::create([
            'jenis_arsip'   => $request->jenis_arsip,
            'no_arsip'      => $request->no_arsip,
            'nama_pemohon'  => $request->nama_pemohon,
            'keterangan'    => $request->keterangan,
            'status'        => $request->status,
        ]);

        return back()->with('success', 'Arsip berhasil disimpan');
    }
}
