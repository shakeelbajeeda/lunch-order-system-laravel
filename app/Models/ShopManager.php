<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopManager extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'shop_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function shop()
    {
        return $this->belongsTo(AusShop::class, 'shop_id');
    }
}
