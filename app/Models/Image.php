<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images'; // Nama tabel
    protected $primaryKey = 'id_image'; // Primary key adalah id_image

    protected $fillable = [
        'title',
        'harga',
        'stok',
        'path',
        'kategori',
        'deskripsi',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
}
