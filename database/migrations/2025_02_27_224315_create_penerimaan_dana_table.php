<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penerimaan_dana', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_anggaran');
            $table->string('sumber_dana');
            $table->foreignId('apbd_id')->nullable()->constrained('apbd');
            $table->date('tanggal_penerimaan');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_dana');
    }
};
