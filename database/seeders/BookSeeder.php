<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 
        for ($i=1;$i<=100;$i++){
            $book = new Book;
            $book->bookname = $faker->name;
            $book->authorname = $faker->name;
            $book->language = $faker->name;
            $book->save();
        }
    }
}
