<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewableEnergyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'energy_type',
        'market_price',
        'administration_fee',
        'tax',
    ];
}
