<?php

namespace Database\Factories;

use App\Models\Writers;
use Illuminate\Database\Eloquent\Factories\Factory;

class WritersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Writers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_name' => $this->faker->name,
            'most_known_for'=>$this->faker->realText($maxNbChars = 20, $indexSize = 2),
            'age' => $this->faker->numberBetween($min = 30, $max = 90),
            'awards_num' => $this->faker->numberBetween($min = 0, $max = 20)
            
        ];
    }
}
