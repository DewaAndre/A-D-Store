<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_cart';
    protected $fillable = ['id_user'];

    // Relasi dengan CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'id_cart');
    }
}
