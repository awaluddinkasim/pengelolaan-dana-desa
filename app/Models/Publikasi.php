<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = 'publikasi';

    protected $fillable = [
        'judul',
        'jenis_publikasi',
        'tahun_anggaran',
        'deskripsi',
        'tanggal_publikasi',
        'file',
    ];
}
