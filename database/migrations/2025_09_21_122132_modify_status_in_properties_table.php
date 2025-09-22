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
        Schema::table('properties', function (Blueprint $table) {
            // Tambahkan 'Menunggu Review' dan ubah defaultnya
            $table->enum('status', ['Menunggu Review', 'Tersedia', 'Terjual', 'Disewa'])
                  ->default('Menunggu Review')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            //
        });
    }
};
