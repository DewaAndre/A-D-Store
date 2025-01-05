<?php

// app/Models/Checkout.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'checkout';  // Nama tabel

    protected $fillable = [
        'name', 'address', 'city', 'province', 'phone', 'email', 'payment_method', 'additional_info', 'user_id', 'total',
    ];

    // Relasi dengan OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'checkout_id');
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


