<?php

namespace App\Models;

use App\Helpers\ProductCollectionHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Custom collection.
     */
    public function newCollection(array $models = []): Collection
    {
        return new ProductCollectionHelper($models);
    }

    /**
     * Scope: With prices.
     */
    public function scopeWithPrices(Builder $query, array $group_ids = [1])
    {
        $query->where('products.id', '>', 0);
    }

    /**
     * Scope: single product.
     */
    public function scopeSingleProduct(Builder $query, int $id)
    {
        $query->where('products.id', $id);
    }

    /**
     * Product image URL (FIXED).
     */
    public function getImage()
    {
        if (!$this->image_name) {
            return asset('images/placeholder.png'); // fallback
        }

        return asset('storage/images/products/'.$this->image_name);
    }

    /**
     * Price helpers.
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function getStockPrice()
    {
        return $this->price;
    }

    public function getCartQuantityPrice()
    {
        return $this->getPrice() * $this->pivot->quantity;
    }

    /**
     * Product link.
     */
    public function getLink()
    {
        return route('shop.details', ['id' => $this->id]);
    }
}
