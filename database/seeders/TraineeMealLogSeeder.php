<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TraineeMealLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('trainee_meal_logs')->insert([
                'trainee_list_id' => $faker->numberBetween(1, 199), // Adjust the range based on your trainee_lists table
                'trainee_id' => $faker->numberBetween(1, 199),
                'date_scanned' => $faker->date,
                'time_scanned' => $faker->time,
                'meal_type_id' => $faker->numberBetween(1, 3), // Adjust the range based on your meal_types table
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
