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
        Schema::create('apbd', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('nomor_perdes');
            $table->date('tanggal_perdes');
            $table->integer('total_pendapatan');
            $table->integer('total_belanja');
            $table->integer('total_pembiayaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apbd');
    }
};
