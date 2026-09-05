<?php
namespace App\Models;

use App\Enums\TenantStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model {
    use SoftDeletes;
    
    protected $fillable = ['owner_id', 'name', 'slug', 'description', 'image', 'status'];
    protected $casts = ['status' => TenantStatus::class];

    public function owner() { return $this->belongsTo(User::class, 'owner_id'); }
    public function categories() { return $this->hasMany(Category::class); }
    public function products() { return $this->hasMany(Product::class); }
    public function orders() { return $this->hasMany(Order::class); }
}