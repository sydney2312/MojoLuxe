<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pets')->insert([
            [
                'user_id' => 1,
                'name' => 'Mojo',
                'type' => 'Dog',
                'breed' => 'Poodle',
                'age' => 3,
                'personality' => 'Playful',
                'avatar' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'user_id' => 2,
                'name' => 'Luna',
                'type' => 'Dog',
                'breed' => 'Golden Retriever',
                'age' => 2,
                'personality' => 'Friendly',
                'avatar' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ]);
    }
}
