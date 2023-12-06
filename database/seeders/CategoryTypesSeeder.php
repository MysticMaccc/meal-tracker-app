<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Stay-in' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Commute' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'External' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'NMC' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Reviewee' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Mandatory' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Upgrading' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Maritime' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Cook' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'UTP' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'NYK-REP' , 'created_at' => now() , 'updated_at' => now()],
            // Add more data as needed
        ];

        foreach ($data as $categoryType) {
            DB::table('category_types')->insert($categoryType);
        }
    }
}
