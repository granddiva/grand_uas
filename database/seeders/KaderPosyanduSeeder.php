<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KaderPosyanduSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $peranList = ['Ketua', 'Bendahara', 'Sekretaris', 'Anggota'];

        $wargaIDs = DB::table('wargas')->pluck('warga_id')->toArray();
        $posyanduIDs = DB::table('posyandu')->pluck('posyandu_id')->toArray();

        $data = [];

        for ($i = 1; $i <= 100; $i++) {

            $mulai = $faker->dateTimeBetween('-3 years', 'now')->format('Y-m-d');

            $akhir = rand(1, 100) <= 30
                ? $faker->dateTimeBetween($mulai, 'now')->format('Y-m-d')
                : null;

            $data[] = [
                'posyandu_id' => $faker->randomElement($posyanduIDs),
                'warga_id' => $faker->randomElement($wargaIDs),
                'peran' => $faker->randomElement($peranList),
                'mulai_tugas' => $mulai,
                'akhir_tugas' => $akhir,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('kader_posyandu')->insert($data);
    }
}
