<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllEnergyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'price',
        'administration_fee',
        'energy_tax',
    ];
}
