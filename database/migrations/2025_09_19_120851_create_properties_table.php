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
        $table->string('name');
        $table->string('location');
        $table->bigInteger('price');
        $table->enum('type', ['Rumah', 'Apartemen', 'Tanah', 'Ruko']);
        $table->text('description');
        $table->string('image_url');
        $table->integer('bedrooms');
        $table->integer('bathrooms');
        $table->integer('surface_area'); // Luas tanah/bangunan dalam m²
        $table->timestamps();
    });
}
};
