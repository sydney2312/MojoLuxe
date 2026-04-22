<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    public function run(): void
    {
        // Memory Match already exists as id=2
        // Just insert Paw Roulette if it doesn't exist yet
        DB::table('games')->insertOrIgnore([
            [
                'id'               => 3,
                'name'             => 'Paw Roulette',
                'points_reward'    => 500,
                'cooldown_seconds' => 86400,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }
}
