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

        for ($i = 1; $i < 201; $i++) {
            DB::table('trainee_lists')->insert([
                'trainee_id' => $i,
                'enroled_id' => $faker->randomNumber(),
                'rank' => $faker->randomElement(['C/E','2AE','3AE','BSN','CE','MSTR','CM','2M','FTR']),
                'lastname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'middlename' => $faker->lastName,
                'suffix' => $faker->suffix,
                'course' => $faker->randomElement(['Refresher Course on Proficiency in Survival Craft and Rescue Boat other than Fast Rescue Boats',
                    'Survival Craft and Rescue Boat other than Fast Res','Basic Training','MEFA','Engine Maintenance Training for Engineers',
                'Purifier Training','Electrical Training','Container Cargo Operation Training (PowerStow)']),
                'course_code' => $faker->randomElement(['NMC 06','NMC 71','NMC 73','NMCR 03','BT','SDSD','GMDSS','SDSD']),
                'course_type' => $faker->randomElement(['NMC','NMCR','Mandatory','Upgrading','Value-up']),
                'company' => $faker->company,
                'bus' => $faker->randomElement(['Yes','No']),
                'dorm' => $faker->randomElement(['No','Single','2-Sharing','4-Sharing','6-Sharing']),
                'training_start_date' => $faker->date,
                'training_end_date' => $faker->date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
