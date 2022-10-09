<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDeposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'transaction_id'
    ];
}
