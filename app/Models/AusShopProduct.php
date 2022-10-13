<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AusShopProduct extends Model
{
    use HasFactory;
    protected $table = "aus_shops_products";
    protected $fillable = [
      'shop_id',
      'product_id',
    ];
}
