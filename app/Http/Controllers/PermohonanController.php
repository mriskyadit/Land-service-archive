<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\History;
use Illuminate\Http\Request;


class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $status = $request->query('status');

        $query = Permohonan::query();

        // 🔽 TAMBAHAN UNTUK LOKET (WAJIB)
        // Loket hanya menampilkan permohonan BARU
        $query->where('status', 'baru');

        if ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('nama_pemohon', 'like', "%{$q}%")
                    ->orWhere('jenis_layanan', 'like', "%{$q}%")
                    ->orWhere('keterangan', 'like', "%{$q}%");
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        $data = $query->latest()->paginate(10)->withQueryString();
        $statuses = Permohonan::select('status')->distinct()->pluck('status');

        return view('permohonan.index', compact('data', 'statuses', 'q', 'status'));
    }

    public function create()
    {
        return view('permohonan.create');
    }

    public function store(Request $request)
{
    $permohonan = Permohonan::create([
        'nama_pemohon'  => $request->nama_pemohon,
        'jenis_layanan' => $request->jenis_layanan,
        'status'        => 'Loket',
        'keterangan'    => $request->keterangan,
    ]);

    // HISTORY OTOMATIS (LANGKAH 1)
    History::create([
        'permohonan_id' => $permohonan->id,
        'status_lama'   => null,
        'status_baru'   => 'Loket',
        'keterangan'    => 'Permohonan diajukan di loket',
    ]);

    return redirect()->route('permohonan.index')
        ->with('success', 'Permohonan berhasil ditambahkan');
}
    public function edit($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('permohonan.edit', compact('permohonan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemohon' => 'required|string|max:255',
            'jenis_layanan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $permohonan = Permohonan::findOrFail($id);
        $permohonan->update($request->all());

        return redirect()
            ->route('permohonan.index')
            ->with('success', 'Permohonan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();

        return redirect()
            ->route('permohonan.index')
            ->with('success', 'Permohonan berhasil dihapus');
    }

        public function kirimH2P($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // simpan status lama
        $statusLama = $permohonan->status;

        // update status ke H2P
        $permohonan->update([
            'status' => 'H2P'
        ]);

        // simpan history otomatis
        History::create([
            'permohonan_id' => $permohonan->id,
            'status_lama'   => $statusLama,
            'status_baru'   => 'H2P',
            'keterangan'    => 'Permohonan dikirim dari Loket ke H2P',
        ]);

        return redirect()->route('permohonan.index')
            ->with('success', 'Permohonan berhasil dikirim ke H2P');
    }

}
