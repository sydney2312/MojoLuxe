<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyQuiz extends Model
{
    use HasFactory;

    protected $table = 'daily_quiz';

    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
        'date_active'
    ];

    public function answers()
    {
        return $this->hasMany(UserQuizAnswer::class, 'quiz_id');
    }

    public function getOptions()
    {
        return [
            'a' => $this->option_a,
            'b' => $this->option_b,
            'c' => $this->option_c,
            'd' => $this->option_d,
        ];
    }
}
