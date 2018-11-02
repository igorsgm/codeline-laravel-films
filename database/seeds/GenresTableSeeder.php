<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['name' => 'Absurdist/surreal/whimsical', 'slug' => 'absurdist-surreal-whimsical'],
            ['name' => 'Action', 'slug' => 'action'],
            ['name' => 'Adventure', 'slug' => 'adventure'],
            ['name' => 'Comedy', 'slug' => 'comedy'],
            ['name' => 'Crime', 'slug' => 'crime'],
            ['name' => 'Drama', 'slug' => 'drama'],
            ['name' => 'Fantasy', 'slug' => 'fantasy'],
            ['name' => 'Historical', 'slug' => 'historical'],
            ['name' => 'Historical fiction', 'slug' => 'historical-fiction'],
            ['name' => 'Horror', 'slug' => 'horror'],
            ['name' => 'Magical realism', 'slug' => 'magical-realism'],
            ['name' => 'Mystery', 'slug' => 'mystery'],
            ['name' => 'Paranoid Fiction', 'slug' => 'paranoid-fiction'],
            ['name' => 'Philosophical', 'slug' => 'philosophical'],
            ['name' => 'Political', 'slug' => 'political'],
            ['name' => 'Romance', 'slug' => 'romance'],
            ['name' => 'Saga', 'slug' => 'saga'],
            ['name' => 'Satire', 'slug' => 'satire'],
            ['name' => 'Science fiction', 'slug' => 'science-fiction'],
            ['name' => 'Social', 'slug' => 'social'],
            ['name' => 'Speculative', 'slug' => 'speculative'],
            ['name' => 'Thriller', 'slug' => 'thriller'],
            ['name' => 'Urban', 'slug' => 'urban'],
            ['name' => 'Western', 'slug' => 'western']
        ];

        DB::table('genres')->insert($genres);
    }
}
