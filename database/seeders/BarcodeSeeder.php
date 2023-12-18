<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BarcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            $startDate = $faker->dateTimeBetween('now', '+30 days')->format('Y-m-d');
            $endDate = $faker->dateTimeBetween($startDate, '+60 days')->format('Y-m-d');

            DB::table('barcodes')->insert([
                'card_number' => $index,
                'barcode_value' => $index,
                'category_id' => $faker->numberBetween(1 , 9),
                'category_type_id' => $faker->numberBetween(1 , 11),
                'owner' => $faker->name,
              
                'company' => $faker->randomElement(['NETI','NTMA','NSMI']),
                'start_date' => $startDate,
                'end_date' => $endDate,

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
