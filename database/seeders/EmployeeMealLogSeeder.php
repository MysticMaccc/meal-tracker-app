<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EmployeeMealLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            DB::table('employee_meal_logs')->insert([
                'barcode_id' => $faker->numberBetween(1 , 200),
                'date_scanned' => $faker->date,
                'time_scanned' => $faker->time,
                'meal_type_id' => $faker->numberBetween(1 , 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
