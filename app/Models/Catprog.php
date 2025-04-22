<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catprog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image_path',
        'course_count',
    ];
}
