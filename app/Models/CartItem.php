<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cart_item';
    protected $fillable = ['id_cart', 'id_image', 'quantity', 'price'];

    // Relasi dengan Image
    public function image()
    {
        return $this->belongsTo(Image::class, 'id_image');
    }
}
