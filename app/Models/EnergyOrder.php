<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnergyOrder extends Model
{
    use HasFactory;

    protected $fillable = [
      'buyer_user_id',
      'seller_user_id',
      'energy_id',
      'purchased_volume',
      'total_price',
    ];

    /**
     * Get buyer that owns this order
     *
     * @return BelongsTo
     */
    public function energy_buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_user_id');
    }


    /**
     * Get seller that owns this order
     *
     * @return BelongsTo
     */
    public function energy_seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    /**
     * Get renewable energy of this order
     *
     * @return BelongsTo
     */
    public function energy(): BelongsTo
    {
        return $this->belongsTo(Energy::class);
    }
}
