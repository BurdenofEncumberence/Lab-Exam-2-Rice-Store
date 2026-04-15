<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rice extends Model
{
    use HasFactory;
    protected $table = 'rices';
    
    protected $fillable = ['name', 'price', 'stockAmount', 'description'];
}
