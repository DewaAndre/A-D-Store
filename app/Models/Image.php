<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $primaryKey = 'id_image';

    protected $fillable = [
        'title',
        'harga',
        'stok',
        'path',
        'kategori',
        'deskripsi',
        // 'id_seller', // Hapus kolom 'id_seller' dari fillable
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
