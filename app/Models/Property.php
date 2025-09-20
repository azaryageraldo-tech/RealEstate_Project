<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // <-- TAMBAHKAN INI
        'status', // <-- TAMBAHKAN INI JUGA
        'name',
        'location',
        'price',
        'type',
        'description',
        'image_url',
        'bedrooms',
        'bathrooms',
        'surface_area',
    ];
}