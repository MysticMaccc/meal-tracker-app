<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BarcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('barcodes')->insert([
                'card_number' => $faker->unique()->numberBetween(1 , 5000),
                'barcode_value' => $faker->unique()->ean13,
                'category_id' => $faker->numberBetween(1 , 9),
                'category_type_id' => $faker->numberBetween(1 , 11),
                'owner' => $faker->name,
                'company' => $faker->company,
                'course' => $faker->word,
                'course_code' => $faker->word,
                'course_type' => $faker->word,
                'start_date' => $faker->date,
                'end_date' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
