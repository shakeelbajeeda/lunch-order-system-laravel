<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AusShop extends Model
{
    use HasFactory;
    protected $table= "aus_shops";
    protected $fillable = [
      'name',
      'owner',
      'opening_time',
      'closing_time',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products() {
        return $this->belongsToMany(Product::class,  'aus_shops_products', 'shop_id', 'product_id');
    }
}
