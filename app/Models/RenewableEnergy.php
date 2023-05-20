<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RenewableEnergy extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'renewable_energy_type_id',
      'volume',
      'price',
    ];


    /**
     * Get the renewable energy type of the renewable energy.
     *
     * @return BelongsTo
     */
    public function renewableEnergyType(): BelongsTo
    {
        return  $this->belongsTo(RenewableEnergyType::class);
    }

    /**
     * Get the user that owns the renewable energy.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
