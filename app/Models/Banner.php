<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
    'title',
    'image_path',
    'link_url',
    'position',
    'is_active',
];
}
