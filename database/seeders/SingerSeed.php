<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SingerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        $tam = 500;

        for($i=0; $i<$tam; $i++){
            DB::table('singers')->insert(
                [
                    'fullName' => $faker->name,
                    'nickName' => $faker->name,
                    'description' => $faker->text,
                    'image' => 'image/Bf2P1xvTqmLl4JvEAKseyRu7CCPT4n79RXJAx2AW.jpeg'
                ]
            );
        }
    }
}
