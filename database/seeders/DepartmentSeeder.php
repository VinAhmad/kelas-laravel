<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('departments')->insert([
        //     'name' => "Human Resource",
        //     'code' => "HRD",
        // ]);

        $data = [
            ['name' => 'Finance', 'code' => 'F'],
            ['name' => 'IT Engineering', 'code' => 'IT'],
            ['name' => 'Administrasi', 'code' => 'ADM'],
            ['name' => 'Operation', 'code' => 'OP'],
        ];

        foreach ($data as $d){
            DB::table('departments')->insert([
                'name' => $d['name'],
                'code' => $d['code'],
            ]);
        }
    }
}
