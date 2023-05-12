<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'category',
        'price',
        'delPrice',
        'sold',
        'productNo',
        'quantity',
        'image',
        'pricePer',
        'description',
        'type',
    ];
}
