<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'Administrator', 'Moderator', 'User'
            ]),
            'slug' => $this->faker->randomElement([
                'admin', 'moderator', 'user'
            ]),
            'description' => $this->faker->sentence(10),
        ];
    }
}
