<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * Products in this order.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot('id', 'product_id', 'user_id', 'price', 'quantity')
            ->withTimestamps();
    }

    /**
     * Order items.
     */
    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
