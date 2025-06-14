<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

     protected $fillable = [
        'subscription_id',
        'gateaway_name',
        'payment_ref',
        'status',
        'amount',
        'raw_payload',
    ];
}
