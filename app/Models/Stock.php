<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'barcode',
        'client_name',
        'idno',
        'phone',
        'product_name',
        'buying_price',
        'selling_price',
        'photo',
        'photo_one',
        'photo_two',
    ];
}
