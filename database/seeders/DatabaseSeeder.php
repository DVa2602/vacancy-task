<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(20)->create();
        Book::factory(100)->create();

        $authors= Author::all();

        Book::all()->each(function ($book) use ($authors) {
            $book->authors()->attach(
                $authors->random(rand(1, 5))->pluck('id')->toArray()
            );
        });

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
