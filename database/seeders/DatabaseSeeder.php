<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Article::factory()->times(100)->create();
        /**
        * TODO:
        * 
        * Create 10,000 players in the system.
        */
        // \App\Models\User::factory(10)->create();
        // $this->call(PlayerSeeder::class);

        /**
        * TODO:
        * 
        * Create 3,835 days of gaming.
        * 5 games (Call of Duty, Mortal Kombat, 
        * FIFA, Just Cause, Apex Legend) 
        * with different versions from 2010 to 2020.
        */
        // $this->call(GameSeeder::class);

    }
}
