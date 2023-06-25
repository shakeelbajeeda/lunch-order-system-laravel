<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Energy extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'all_energy_type_id',
      'energy_volume',
      'energy_price',
    ];


    /**
     * Get the renewable energy type of the renewable energy.
     *
     * @return BelongsTo
     */
    public function all_energy_type(): BelongsTo
    {
        return  $this->belongsTo(AllEnergyType::class);
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
