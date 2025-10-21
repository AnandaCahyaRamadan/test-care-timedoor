<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Container\Attributes\DB as AttributesDB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory()->count(1000)->create();
        Category::factory()->count(3000)->create();

        $books = Book::factory()->count(100000)->make()->toArray();

        foreach (array_chunk($books, 1000) as $chunk) {
            DB::table('books')->insert($chunk);
        }
    }
}
