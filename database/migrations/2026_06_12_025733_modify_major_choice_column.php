<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE registrations
            MODIFY major_choice ENUM(
                'RPL',
                'TKJ',
                'AKL',
                'FRM'
            ) NOT NULL
        ");
    }

    public function down(): void
    {
        //
    }
};