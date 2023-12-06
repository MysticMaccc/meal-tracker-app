<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TraineeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('trainee_lists')->insert([
                'trainee_id' => $faker->randomNumber(),
                'enroled_id' => $faker->randomNumber(),
                'rank' => $faker->word,
                'lastname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'middlename' => $faker->lastName,
                'suffix' => $faker->suffix,
                'course' => $faker->word,
                'course_code' => $faker->word,
                'course_type' => $faker->word,
                'company' => $faker->company,
                'bus' => $faker->word,
                'dorm' => $faker->word,
                'training_start_date' => $faker->date,
                'training_end_date' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
