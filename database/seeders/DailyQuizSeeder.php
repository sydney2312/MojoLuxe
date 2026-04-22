<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyQuizSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('daily_quiz')->insert([
            [
                'question' => 'What is the largest breed of dog?',
                'option_a' => 'Beagle',
                'option_b' => 'Great Dane',
                'option_c' => 'Poodle',
                'option_d' => 'Chihuahua',
                'correct_answer' => 'B',
                'date_active' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'question' => 'Which sense is strongest in dogs?',
                'option_a' => 'Sight',
                'option_b' => 'Smell',
                'option_c' => 'Hearing',
                'option_d' => 'Taste',
                'correct_answer' => 'B',
                'date_active' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],

            [
                'question' => 'Which is not a safe treat for dogs?',
                'option_a' => 'Chocolate',
                'option_b' => 'Grapes',
                'option_c' => 'Onions',
                'option_d' => 'All of the Above',
                'correct_answer' => 'D',
                'date_active' => Carbon::today(),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ]);
    }
}
