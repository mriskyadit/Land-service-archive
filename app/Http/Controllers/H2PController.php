<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\History;
use Illuminate\Http\Request;

class H2PController extends Controller
{
    public function ambilArsip()
    {
        // Ambil data yang siap masuk H2P
        // (misal dari status Loket)
        $data = Permohonan::where('status', 'Loket')->get();

        foreach ($data as $item) {
            // Update status ke H2P
            $item->update([
                'status' => 'H2P'
            ]);

            // Catat history
            History::create([
                'permohonan_id' => $item->id,
                'status_lama'   => 'Loket',
                'status_baru'   => 'H2P',
                'keterangan'    => 'Data diambil oleh H2P'
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Data berhasil diambil ke H2P');
    }
}
