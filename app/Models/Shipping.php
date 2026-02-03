<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shipping';

    /**
     * The groups that belong to the Shipping.
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'shipping_options')
            ->withPivot('id', 'status')
            ->withTimestamps()
        ;
    }

    /**
     * Get all of the shipping_options for the Shipping.
     */
    public function shipping_options(): HasMany
    {
        return $this->hasMany(ShippingOption::class, 'shipping_id', 'id');
    }
}
