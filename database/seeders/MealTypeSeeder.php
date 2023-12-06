<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Breakfast' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Lunch' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Dinner' , 'created_at' => now() , 'updated_at' => now()],
        ];

        foreach ($data as $mealtype) {
            DB::table('meal_types')->insert($mealtype);
        }
    }
}
