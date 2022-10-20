<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        Listing::factory(6)->create();
        // Listing::create([
        //     'title' => 'Laravel developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Proctor Intl',
        //     'location' => 'Islamabad',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.google.com/',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat non ipsum commodi iste tenetur minus doloribus culpa fugit nesciunt maiores doloremque soluta enim voluptatibus, at cumque voluptatum facilis error? Ullam.',
        // ]);
        // Listing::create([
        //     'title' => 'Vue developer',
        //     'tags' => 'Vue, javascript',
        //     'company' => 'Proctor global',
        //     'location' => 'Peshawar',
        //     'email' => 'adil@adil.com',
        //     'website' => 'https://www.w3school.com/',
        //     'description' => 'Adipisicing elit. Repellat non ipsum commodi iste tenetur minus doloribus culpa fugit nesciunt maiores doloremque soluta enim voluptatibus, at cumque voluptatum facilis error? Ullam.',
        // ]);
    }
}
