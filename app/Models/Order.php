<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_amount', 'status'];

    // One order has many items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // One order has one payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}