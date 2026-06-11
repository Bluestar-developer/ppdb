<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jam_operasional_ppdb', function (Blueprint $table) {
            $table->string('hari')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('jam_operasional_ppdb', function (Blueprint $table) {
            $table->dropColumn(['hari', 'tanggal', 'jam_mulai', 'jam_selesai']);
        });
    }
};
