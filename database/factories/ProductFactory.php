<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => Category::get()->random()->id,
            'name' => $this->faker->sentence(3, true),
            'slug' => '',
            'price' => random_int(1 , 100000),
            'size' => random_int(0 , 1000),
            'thc' => random_int(0 , 10000),
            'cbd' => random_int(0 , 10000),
            'sku' => random_int(0 , 10000),
            'rating' => random_int(0 , 10),
            'discount' => random_int(0 , 10000),
            'discount_enable' => $this->faker->boolean,
            'img_main' => 'products/03.jpg',
            'images' => [
                                   'products/02.webp',
                                   'products/05.webp'
                              ],
            'title_seo' => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(300),
            'description_seo' => $this->faker->sentence(300),
            'plant_type' => $this->faker->sentence(3, true),
            'keywords' => $this->faker->word.','. $this->faker->word.','. $this->faker->word,
            'effects' => $this->faker->word.','. $this->faker->word.','. $this->faker->word,
            'is_published' => $this->faker->boolean
        ];
    }
}
