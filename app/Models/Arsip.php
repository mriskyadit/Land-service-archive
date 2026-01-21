<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $fillable = [
    'jenis_arsip',
    'no_arsip',
    'nama_pemohon',
    'keterangan',
    'status'
];

}
