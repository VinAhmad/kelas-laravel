<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i <= 23; $i++) { 
            DB::table('employee_inventory')->insert([
                'description' => "Data Peminjaman ke ". $i+1,
                'employee_id' => $faker->numberBetween($min = 1, $max = 24),
                'inventory_id' => $faker->numberBetween($min = 1, $max = 3),
                'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = null),
            ]);
        }
    }
}
