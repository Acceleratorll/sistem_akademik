<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pel = [
            [
                'nama_pelajaran' => 'Mat'
            ],
            [
                'nama_pelajaran' => 'IPS'
            ],
            [
                'nama_pelajaran' => 'IPA'
            ],
            [
                'nama_pelajaran' => 'Bahasa'
            ],
        ];

        DB::table('pelajaran')->insert($pel);
    }
}
