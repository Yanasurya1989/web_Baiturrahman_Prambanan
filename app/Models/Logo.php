<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_path',
        'address',
        'phone',
        'email',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
    ];
}
