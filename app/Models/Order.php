<?php
namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = [
        'user_id', 'tenant_id', 'pickup_slot_id', 'order_number',
        'status', 'subtotal', 'total_amount', 'pickup_code',
        'paid_at', 'completed_at', 'cancelled_at'
    ];
    
    protected $casts = [
        'status' => OrderStatus::class,
        'subtotal' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'completed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function items() { return $this->hasMany(OrderItem::class); }
    public function payment() { return $this->hasOne(Payment::class); }
    public function tenant() { return $this->belongsTo(Tenant::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function pickupSlot() { return $this->belongsTo(PickupSlot::class); }
}