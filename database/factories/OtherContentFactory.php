<?php

namespace Database\Factories;

use App\Models\OtherContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class OtherContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OtherContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'employee' => 300,
            'client' => 300,
            'whatweare' => $this->faker->text,
            'image' => 'storege/ceo_img.jpg',
            'about' => $this->faker->text
        ];
    }
}
