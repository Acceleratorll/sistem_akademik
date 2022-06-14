<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MhsPelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapela = [
            [
                'mhs_id' => '1',
                'pelajaran_id' => '1'
            ],
            [
                'mhs_id' => '1',
                'pelajaran_id' => '2'
            ],
            [
                'mhs_id' => '1',
                'pelajaran_id' => '3'
            ],
        ];

        DB::table('mapela')->insert($mapela);
    }
}
