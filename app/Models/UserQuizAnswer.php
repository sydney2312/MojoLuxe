<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuizAnswer extends Model
{
    use HasFactory;

    protected $table = 'user_quiz_answers';

    protected $fillable = [
        'user_id',
        'quiz_id',
        'selected_answer',
        'is_correct',
        'points_earned',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(DailyQuiz::class, 'quiz_id');
    }
}
