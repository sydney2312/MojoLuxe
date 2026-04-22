<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGameScore extends Model
{
    use HasFactory;

    protected $table = 'user_game_scores';

    protected $fillable = [
        'user_id',
        'game_id',
        'score',
        'points_earned',
        'played_at',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
