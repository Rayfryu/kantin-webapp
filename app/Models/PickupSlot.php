<?php

namespace App\Models;

use App\Enums\PickupSlotStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PickupSlot extends Model
{
    protected $fillable = [
        'start_time', 
        'end_time', 
        'capacity', 
        'status'
    ];

    protected $casts = [
        'status' => PickupSlotStatus::class,
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}