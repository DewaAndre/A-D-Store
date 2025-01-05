<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';  // Nama tabel

    public function image()
    {
        return $this->belongsTo(Image::class, 'id_image');
    }   

    protected $fillable = [
        'checkout_id', 'id_image', 'quantity', 'price',
    ];

    // Relasi dengan Checkout
    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'checkout_id');
    }

    // public function image()
    // {
    //     return $this->belongsTo(Images::class, 'id_image');
    // }
}



