<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Games;

class GameSeeder extends Seeder
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
         * Create 3,835 days of gaming.
         * 5 games (Call of Duty, Mortal Kombat, 
         * FIFA, Just Cause, Apex Legend) 
         * with different versions from 2010 to 2020.
        */

        \App\Models\Games::truncate();
        $faker = \Faker\Factory::create();
        $versions = array('2000','2001', '2003', '2004', '2005');
        $games = array('Call of Duty', 'Mortal Kombat',
                        'FIFA', 'Just Cause', 'Apex Legend');


        for($i = 0; $i < mt_rand(0, 4); $i++){
            $vers = $versions[mt_rand(0,count($versions) - 1)];
            $game_name = $games[mt_rand(0,count($games) - 1)];
            \App\Models\Games::create([
                'name' => $faker->name,
                'version' => $games[$i] .' '. $faker->numberBetween($min=2010, $max=2020),
                'date_added' => $faker->dateTimeThisYear($max = 'now', $timezone = 'Africa/Lagos'),
            ]);
        }
    }
}
