<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenerimaanDana extends Model
{
    protected $table = 'penerimaan_dana';

    protected $fillable = [
        'tahun_anggaran',
        'sumber_dana',
        'apbd_id',
        'tanggal_penerimaan',
        'jumlah',
    ];

    public function apbd(): BelongsTo
    {
        return $this->belongsTo(APBD::class);
    }
}
