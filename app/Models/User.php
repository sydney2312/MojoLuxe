<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * ================= RELATIONSHIPS =================.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart', 'user_id', 'product_id')
            ->withPivot('id', 'quantity')
            ->withTimestamps();
    }

    public function pet(): HasOne
    {
        return $this->hasOne(Pet::class);
    }

    /**
     * 🧾 ORDERS.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    /**
     * 🪙 POINTS SYSTEM.
     */
    public function pointsWallet(): HasOne
    {
        return $this->hasOne(PointsWallet::class);
    }

    public function quizAnswers(): HasMany
    {
        return $this->hasMany(UserQuizAnswer::class);
    }

    public function gameScores(): HasMany
    {
        return $this->hasMany(UserGameScore::class);
    }

    /**
     * 🧠 GROUPS.
     */
    public function getGroups(): array
    {
        return [1];
    }

    /**
     * ================= BOOT =================.
     */
    protected static function booted()
    {
        static::created(function ($user) {
            PointsWallet::create([
                'user_id' => $user->id,
                'points_balance' => 0,
            ]);
        });
    }
}
