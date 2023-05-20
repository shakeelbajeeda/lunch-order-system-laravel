<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
      'buyer_id',
      'seller_id',
      'renewable_energy_id',
      'volume',
      'price',
    ];

    /**
     * Get buyer that owns this order
     *
     * @return BelongsTo
     */
    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }


    /**
     * Get seller that owns this order
     *
     * @return BelongsTo
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    /**
     * Get renewable energy of this order
     *
     * @return BelongsTo
     */
    public function renewableEnergy(): BelongsTo
    {
        return $this->belongsTo(RenewableEnergy::class);
    }
}
