<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $types = ['parent', 'children'];
        return [
            'type'  =>  $types[random_int(0,1)],
            'tariff_id' =>  random_int(1,3),
            'age'   =>  random_int(10, 40),
            'login' =>  $this->faker->email,
            'password'  =>  Hash::make('1234'),
            'phone'     =>  $this->faker->phoneNumber,
            'school_id' =>  random_int(1,15),
            'name'      =>  $this->faker->firstName,
            'surname'   =>  $this->faker->lastName,
        ];
    }
}
