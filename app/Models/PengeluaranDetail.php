<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengeluaranDetail extends Model
{
    protected $table = 'pengeluaran_detail';

    protected $fillable = [
        'pengeluaran_id',
        'uraian',
        'volume',
        'satuan',
        'harga_satuan',
    ];

    public function pengeluaran(): BelongsTo
    {
        return $this->belongsTo(Pengeluaran::class);
    }

    public function jumlah(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->volume * $this->harga_satuan,
        );
    }
}
