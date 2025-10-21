<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    public function definition(): array
    {
        static $bookIds = null;

        if ($bookIds === null) {
            $bookIds = Book::pluck('id')->toArray();
        }

        return [
            'book_id' => $this->faker->randomElement($bookIds),
            'rating' => $this->faker->numberBetween(1, 10),
        ];
    }
}
