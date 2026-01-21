<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Permohonan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_pemohon',
        'email_pemohon',
        'jenis_layanan',
        'status',
        'keterangan',
    ];

    // Menentukan email tujuan untuk notifikasi
    public function routeNotificationForMail()
    {
        return $this->email_pemohon;
    }
}
