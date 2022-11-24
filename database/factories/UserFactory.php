<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'status' => $this->faker->randomElement([0,1]),
            'country' => $this->faker->randomElement([
                'England', 'Spain', 'Germany', 'Franch', 'Italy'
            ]),
//            'email' => 'admin@themesbrand.com',
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => 380541234567,
            'avatar' => 'users/avatar-1.jpg',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'created_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
