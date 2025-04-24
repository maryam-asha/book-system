<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $author = Author::create(['name' => 'John Doe']);
        $category = Category::create(['name' => 'Fiction']);

        Book::create([
            'title' => 'Book1',
            'author_id' => $author->id,
            'category_id' => $category->id,
            'publication_year' => 2020,
            'pages' => 300,
            'price' => 29.99,
            'isbn' => '1234567890',
        ]);
    }
}
