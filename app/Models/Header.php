<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'kategori',
        'status'
    ];

    // Default status jika tidak diisi
    protected $attributes = [
        'status' => 'active',
    ];
}
