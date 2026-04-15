<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'amount_paid', 'status', 'paid_at'];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    // Payment belongs to an order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}