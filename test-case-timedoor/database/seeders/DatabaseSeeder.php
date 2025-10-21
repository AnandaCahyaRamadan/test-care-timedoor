<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Author::factory(1000)->create();
        Category::factory(3000)->create();

        $totalBooks = 100000;
        $batchSize = 500;
        for ($i = 0; $i < $totalBooks; $i += $batchSize) {
            $chunk = Book::factory($batchSize)->make()->toArray();
            DB::table('books')->insert($chunk);
            echo "Inserted books: " . ($i + $batchSize) . "\n";
        }

        $totalRatings = 500000;
        $batchSize = 500;

        for ($i = 0; $i < $totalRatings; $i += $batchSize) {
            $chunk = Rating::factory($batchSize)->make()->toArray();
            DB::table('ratings')->insert($chunk);
            echo "Inserted ratings: " . ($i + $batchSize) . "\n";
        }

        echo "Seeding selesai tanpa kehabisan memori!\n";
    }
}
