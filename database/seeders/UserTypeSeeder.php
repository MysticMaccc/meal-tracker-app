<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'System Administrator' , 'is_deleted' => 0 , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Dorm Staff' , 'is_deleted' => 0 , 'created_at' => now() , 'updated_at' => now()],
            ['name' => 'Canteen Staff' , 'is_deleted' => 0 , 'created_at' => now() , 'updated_at' => now()]
        ];

        foreach ($data as $category) {
            DB::table('user_types')->insert($category);
        }
    }
}
