<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id',
      'total_amount',
    ];

    public function products()
    {
        return $this->hasMany(OrderProducts::class, 'order_id');
    }

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
}
