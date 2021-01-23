<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * TODO:
         *
         * Create 10,000 players in the system.
         */

        \App\Models\User::truncate();
        $faker = \Faker\Factory::create();

        $name = '';

        //
        $games = array('Call of Duty', 'Mortal Kombat',
                        'FIFA', 'Just Cause', 'Apex Legend');
        $versions = array('2000','2001', '2003', '2004', '2005');

        for($i = 0; $i < 10; $i++){
            $name = $faker->name;
            // $role = $roles[mt_rand(0,count($roles) - 1)];
            \App\Models\User::create([
                'name' => $name,
                'email' => $faker->unique()->safeEmail,
                'nickname' => $faker->userName(10),
                'last_login' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Africa/Lagos'),
                'remember_token' => Str::random(30),
            ]);


            for($j = 0; $j < 4; $j++){
                $vers = $versions[mt_rand(0,count($versions) - 1)];
                $game_name = $games[mt_rand(0,count($games) - 1)];
                \App\Models\Games::create([
                    'name' => $name,
                    'version' => $games[$j] .' '. $faker->numberBetween($min=2010, $max=2020),
                    'game_play' => $faker->numberBetween($min=0, $max=4),
                    'date_added' => $faker->dateTimeThisYear('+3 years', $timezone = 'Africa/Lagos'),
                ]);
            }

            // for($i = 0; $i < 5; $i++){
            //     $game_name = $games[mt_rand(0,count($games) - 1)];
            //     \App\Models\Gameplays::create([
            //         'name' => $name,
            //         'game' => $games[$i],
            //         'game_play' =>  $faker->numberBetween($min = 1, $max = 100),
            //     ]);
            // }

        }

        // create gameplay for players
        // for($i = 0; $i < 5; $i++){
        //     $game_name = $games[mt_rand(0,count($games) - 1)];
        //     \App\Models\Gameplays::create([
        //         'name' => $name,
        //         'game' => $games[$i],
        //         'game_play' =>  $faker->numberBetween($min = 1, $max = 100),
        //     ]);
        // }
    }
}
