<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {
        static $authorIds = null;
        static $categoryIds = null;

        if ($authorIds === null) {
            $authorIds = Author::pluck('id')->toArray();
        }

        if ($categoryIds === null) {
            $categoryIds = Category::pluck('id')->toArray();
        }

        return [
            'name' => $this->faker->sentence(3),
            'author_id' => $this->faker->randomElement($authorIds),
            'category_id' => $this->faker->randomElement($categoryIds),
        ];
    }
}
