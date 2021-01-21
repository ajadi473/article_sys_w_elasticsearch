<?php

namespace Database\Factories;

use App\Models\Games;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GamesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Games::class;

    /**
     * Define the model's default state.
     * 
     * 5 games
     * Different versions
     *
     * @return array
     */

    public function definition()
    {
        $versions = array('200','2001', '2003', '2004', '2005');
        $games = array('Call of Duty', 'Mortal Kombat',
                        'FIFA', 'Just Cause', 'Apex Legend');

        return [
            'name' => $this->faker->name,
            'version' => Str::random(10),
            'date_added' => now(),
        ];
    }
}
