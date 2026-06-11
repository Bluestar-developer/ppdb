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
        Schema::create('jam_operasional_ppdb', function (Blueprint $table) {
            $table->id();
            $table->string('hari'); // e.g. "Senin - Jumat"
            $table->date('tanggal'); // specific date (optional, may be used for holidays)
            $table->time('jam_mulai'); // start time
            $table->time('jam_selesai'); // end time
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_operasional_ppdb');
    }
};
