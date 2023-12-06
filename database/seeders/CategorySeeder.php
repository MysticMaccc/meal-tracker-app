<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'INSTRUCTOR' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'MANDATORY' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'EMPLOYEE STAFF' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'SNGP' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'NTMA' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'OJT' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'VIP' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'DRIVER' , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'MAINTENANCE' , 'created_at' => now() , 'updated_at' => now()]
            // Add more data as needed
        ];

        foreach ($data as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
