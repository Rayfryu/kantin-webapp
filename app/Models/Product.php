<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
    use SoftDeletes;

    protected $fillable = ['tenant_id', 'category_id', 'name', 'slug', 'description', 'price', 'stock', 'image', 'is_available'];
    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_available' => 'boolean',
    ];

    public function tenant() { return $this->belongsTo(Tenant::class); }
    public function category() { return $this->belongsTo(Category::class); }
}