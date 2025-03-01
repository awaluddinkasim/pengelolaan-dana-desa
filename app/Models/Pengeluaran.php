<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';

    protected $fillable = [
        'tahun_anggaran',
        'tanggal_pengeluaran',
        'penerima',
        'keterangan',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(PengeluaranDetail::class);
    }
}
