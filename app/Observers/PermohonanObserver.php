<?php

namespace App\Observers;

use App\Models\Permohonan;
use App\Models\History;

class PermohonanObserver
{
    // Saat permohonan dibuat
    public function created(Permohonan $permohonan)
    {
        History::add("Permohonan dibuat", $permohonan->id);
    }

    // Saat permohonan diupdate
    public function updated(Permohonan $permohonan)
    {
        $changes = $permohonan->getChanges(); // lihat field yang berubah

        foreach ($changes as $field => $value) {
            if ($field === 'status') { // contoh hanya jika status berubah
                $old = $permohonan->getOriginal($field);
                $new = $value;
                History::add("Status diubah dari $old menjadi $new", $permohonan->id);
            }
        }
    }
}
