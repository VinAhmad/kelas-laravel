<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Honda Jazz Kuning', 'inventory_number' => 'B 1234 AC',],
            ['name' => 'Yamaha N-Max', 'inventory_number' => 'B 2345 AC',],
            ['name' => 'Vespa Biru', 'inventory_number' => 'B 3232 AC', ],
        ];

        foreach ($data as $d){
            DB::table('inventories')->insert([
                'name' => $d['name'],
                'inventory_number' => $d['inventory_number']
            ]);
        }
    }
}
