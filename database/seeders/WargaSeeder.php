<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $data = [];

        for ($i = 1; $i <= 100; $i++) {

            $data[] = [
                'nama' => $faker->name(),
                'nik' => $faker->unique()->numerify('##########'),
                'alamat' => $faker->address(),
                'no_hp' => $faker->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('wargas')->insert($data);
    }
}
