<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketInformation extends Model
{
    use HasFactory;

    protected $table = 'market_informations';
    protected $fillable = [
        'type',
        'price',
        'administration_fee',
        'energy_tax',
    ];
}
