<?php

namespace Database\Seeders;

use App\Models\Election;
use App\Models\Vote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectionOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $tam = 5000;

        for($i=0; $i<$tam; $i++){
                DB::table('votes')->insert(
                    [

                        'ip' => $faker->ipv4,
                        'computerName' => $faker->md5,
                        'election_id' => rand(1,50),
                        'singer_id'=> rand(1,500)
                    ]
            );
        }

        $elections = Election::All();

        foreach($elections as $election){
            $id = $election->id;
            $vote = Vote::where('election_id',$id)->count();
            $election->votes = $vote;
            $election->save();
        }

    }


}
