<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' =>  $this->faker->image,
            'name'  =>  $this->faker->firstName,
            'surname'   =>  $this->faker->lastName,
            'position'  =>  $this->faker->company
        ];
    }
}
