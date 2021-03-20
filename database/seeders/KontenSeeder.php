<?php

namespace Database\Seeders;

use App\Models\KontenM;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KontenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 0; $i < 10; $i++) {
            KontenM::insert([
                'konten_id'     => $faker->numberBetween($min = 1000, $max = 9000),
                'konten_title'  => $faker->word(),
                'konten_slugs'  => $faker->slug(),
                'konten_body'   => $faker->text($maxNbChars = 200),
                'konten_status' => $faker->boolean($chanceOfGettingTrue = 70)
            ]);  
        }
    }
}
