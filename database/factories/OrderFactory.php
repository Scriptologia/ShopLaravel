<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            'orderID' => random_int(1 , 1000000),
            'user_id' => User::get()->random()->id,
            'amount' => random_int(1 , 100000),
            'payment_status' => $this->faker->randomElement([0,1,2,3]),
            'delivery_status' => $this->faker->randomElement([0,1,2,3,4,5]),
            'payment_method' => $this->faker->randomElement(
                [ 'Mastercard', 'Visa', 'Paypal', 'COD' ]
            ),
            'country' => $this->faker->randomElement([
                'England', 'Spain', 'Germany', 'Franch', 'Italy'
            ]),

        ];
    }
}
