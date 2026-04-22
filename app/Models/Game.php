<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = [
        'name',
        'type',
        'points_reward',
        'cooldown_seconds',
    ];

    public function scores()
    {
        return $this->hasMany(UserGameScore::class);
    }
}
