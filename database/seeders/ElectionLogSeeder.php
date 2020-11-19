<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectionLogSeeder extends Seeder
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

        $tam = 50;

        for($i=0; $i<$tam; $i++){
                DB::table('elections')->insert(
                    [
                'name' => $faker->name,
                'description' => $faker->text,
                'starts_in'=> "2020-01-01",
                'ends_in'=> "2020-12-31",
                'image' => "",
                'isOpen' => $faker->boolean,
                'votes' => 0
                    ]
                );
            }


            for($i=0; $i<$tam; $i++){
                $singer1 = rand(1,500);
                $singer2 = rand(1,500);

                while($singer1 == $singer2){
                    $singer1 = rand(1,500);
                    $singer2 = rand(1,500);
                }

                DB::table('election_singer')->insert(
                    [
                'election_id' => ($i+1),
                'singer_id' => $singer1
                ]
                );
                DB::table('election_singer')->insert(
                    [
                'election_id' => ($i+1),
                'singer_id' => $singer2
                ]
                );

            }


    }
}
