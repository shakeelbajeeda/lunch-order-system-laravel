<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable =[
        'brand',
        'amount',
        'card_last4',
        'card_exp_month',
        'card_exp_year'
    ];
}
