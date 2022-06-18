<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrdersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->numberBetween(1,20),
            'book_id' => $this->faker->numberBetween(1,23),
            'quantity' => $this->faker->numberBetween(1,10),
            'total_price' => $this->faker->numberBetween(1000,5000),
            'order_status' => $this->faker->randomElement(['Payed', 'Refunded', 'Pending']),
            'shipment_status' => $this->faker->randomElement(['delivred', 'Processing', 'Canceled']),
            'order_date' => $this->faker->dateTime(),
            'tracking_number' => 'Tr'. $this->faker->numberBetween(10,100).'aC'.$this->faker->numberBetween(99,9999),
        ];
    }
}
