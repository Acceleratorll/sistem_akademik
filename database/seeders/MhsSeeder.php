<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mhs = [
            [
                'major_id' => '1',
                'nim' => '2041720070',
                'nama' => 'Fajrul'

            ],
            [
                'major_id' => '2',
                'nim' => '2041720071',
                'nama' => 'Law'

            ],
            [
                'major_id' => '3',
                'nim' => '2041720072',
                'nama' => 'Accel'

            ],
        ];

        DB::table('mahasiswa')->insert($mhs);
    }
}
