<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'model'=> 'User',
            'slug' => $this->faker->randomElement([
                'user-view', 'user-edit', 'user-create', 'user-delete',
                'product-view', 'product-edit', 'product-create', 'product-delete',
                'order-view', 'order-edit', 'order-create', 'order-delete',
                'category-view', 'category-edit', 'category-create', 'category-delete',
                'role-view', 'role-edit', 'role-create', 'role-delete',
                'permission-view', 'permission-edit', 'permission-create', 'permission-delete',
                'tag-view', 'tag-edit', 'tag-create', 'tag-delete',
            ]),
            'description' => $this->faker->sentence(10)
        ];
    }
}
