<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'quantity' => $this->faker->numberBetween(0,50),
            'price' => $this->faker->numberBetween(100,500),
            'description' => $this->faker->text(100),
            'book_cover' => 'assets/img/products/book_'.$this->faker->unique()->numberBetween(1,23).'.jpg',
            'category_id' => $this->faker->numberBetween(1,11),
            'publication_date'=>$this->faker->dateTime()
        ];
    }


}
