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
    Schema::create('properties', function (Blueprint $table) {
        $table->id();

        // TAMBAHKAN BARIS INI
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('name');
        $table->string('location');
        $table->bigInteger('price');

        // TAMBAHKAN BARIS INI
        $table->enum('status', ['Tersedia', 'Terjual', 'Disewa'])->default('Tersedia');

        $table->enum('type', ['Rumah', 'Apartemen', 'Tanah', 'Ruko']);
        $table->text('description');
        $table->string('image_url');
        $table->integer('bedrooms');
        $table->integer('bathrooms');
        $table->integer('surface_area');
        $table->timestamps();
    });
}
};
