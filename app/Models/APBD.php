<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APBD extends Model
{
    protected $table = 'apbd';

    protected $fillable = [
        'tahun',
        'nomor_perdes',
        'tanggal_perdes',
        'total_pendapatan',
        'total_belanja',
        'total_pembiayaan',
        'keterangan',
    ];
}
