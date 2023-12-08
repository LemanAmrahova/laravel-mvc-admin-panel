<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'name' => 'Hamlet',
                'publish_date' => '2020-02-01',
                'image' => 'hamlet_book_cover.jpg',
                'author_id' => '1',
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
