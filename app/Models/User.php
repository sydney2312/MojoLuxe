<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     *  =============== RELATIONSHIPS  ===============.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart', 'user_id', 'product_id')
            ->withPivot('id', 'quantity')
            ->withTimestamps();
    }

    // ADD THIS
    public function pet(): HasOne
    {
        return $this->hasOne(Pet::class);
    }

    /**
     *  =============== SCOPES  ===============.
     */

    /**
     *  =============== FUNCTIONS  ===============.
     */
    public function getGroups(): array
    {
        $group_ids = [1];

        return $group_ids;
    }
}
