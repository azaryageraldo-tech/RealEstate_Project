<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
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

    /**
     * Relasi untuk mendapatkan pemilik (agen) dari properti ini.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi untuk menghitung views.
     */
    public function views()
    {
        return $this->hasMany(PropertyView::class);
    }

    /**
     * Relasi untuk user yang memfavoritkan properti ini.
     */
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'property_user');
    }
}
