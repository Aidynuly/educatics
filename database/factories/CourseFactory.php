<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' =>  random_int(1,200),
            'description' =>  random_int(1,200),
            'price' =>  random_int(10000,100000),
            'certificate'       =>  $this->faker->image,
        ];
    }
}
