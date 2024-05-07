<?php

namespace Sfneal\Socials\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Sfneal\Socials\Models\Social;

class SocialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Social::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(50),
            'icon' => $this->faker->text(30),
            'url' => $this->faker->url(),
            'description' => $this->faker->text(150),
        ];
    }
}
