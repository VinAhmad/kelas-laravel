<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Manager', 'code' => 'MF', 'department_id' => 1],
            ['name' => 'Manager', 'code' => 'MIT', 'department_id' => 2],
            ['name' => 'Manager', 'code' => 'MADM', 'department_id' => 3],
            ['name' => 'Manager', 'code' => 'MOP', 'department_id' => 4],
            ['name' => 'General Manager', 'code' => 'GMF', 'department_id' => 1],
            ['name' => 'General Manager', 'code' => 'GMIT', 'department_id' => 2],
            ['name' => 'General Manager', 'code' => 'GMADM', 'department_id' => 3],
            ['name' => 'General Manager', 'code' => 'GMOP', 'department_id' => 4],
            ['name' => 'Akuntan', 'code' => 'AK', 'department_id' => 1],
            ['name' => 'Programmer', 'code' => 'P', 'department_id' => 2],
            ['name' => 'Staff', 'code' => 'S', 'department_id' => 3],
            ['name' => 'Teknisi', 'code' => 'T', 'department_id' => 4],

        ];

        foreach ($data as $d){
            DB::table('positions')->insert([
                'name' => $d['name'],
                'code' => $d['code'],
                'department_id' =>$d['department_id'],
            ]);
        }
    }
}
