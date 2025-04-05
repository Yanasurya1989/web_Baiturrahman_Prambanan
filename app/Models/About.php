<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'video_url', 'status'];

    protected $attributes = [
        'status' => 'active',
    ];
}
