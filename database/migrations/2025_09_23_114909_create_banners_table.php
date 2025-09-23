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
    Schema::create('banners', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Untuk referensi internal admin
        $table->string('image_path'); // Path ke file gambar
        $table->string('link_url')->nullable(); // URL tujuan jika banner di-klik
        $table->string('position')->default('homepage_hero'); // Posisi banner
        $table->boolean('is_active')->default(false); // Toggle untuk aktif/nonaktif
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
