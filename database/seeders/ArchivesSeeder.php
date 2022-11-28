<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'BPKB & STNK - Honda Jazz Kuning', 'archive_number' => '000992', 'inventory_id' => 1],
            ['name' => 'BPKB & STNK Yamaha N-Max', 'archive_number' => '0000891', 'inventory_id' => 2],
            ['name' => 'BPKB & STNK - Vespa Biru', 'archive_number' => '000123', 'inventory_id' => 3],
        ];

        foreach ($data as $d){
            DB::table('archives')->insert([
                'name' => $d['name'],
                'archive_number' => $d['archive_number'],
                'inventory_id' => $d['inventory_id']
            ]);
        }
    }
}
