<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'permohonan_id',
        'activity',
        'status_lama',
        'status_baru',
        'keterangan',
    ];

    // Relasi ke Permohonan
    public function permohonan()
    {
        return $this->belongsTo(Permohonan::class);
    }

    // Fungsi untuk menambah history
    public static function add($text, $permohonan_id = null)
    {
        self::create([
            'activity'       => $text,
            'permohonan_id'  => $permohonan_id,
        ]);
    }
}
