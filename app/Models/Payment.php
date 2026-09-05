<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 
        'provider', 
        'transaction_id', 
        'payment_type', 
        'amount', 
        'status', 
        'paid_at', 
        'expired_at', 
        'raw_response'
    ];

    protected $casts = [
        'status' => PaymentStatus::class,
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'expired_at' => 'datetime',
        'raw_response' => 'array', // Meng-cast JSON dari database menjadi array otomatis di PHP
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}