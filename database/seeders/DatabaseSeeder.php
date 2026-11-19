<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $action    = Genre::firstOrCreate(['name' => 'Action']);
        $adventure = Genre::firstOrCreate(['name' => 'Adventure']);
        $drama     = Genre::firstOrCreate(['name' => 'Drama']);
        $comedy    = Genre::firstOrCreate(['name' => 'Comedy']);
        $scifi     = Genre::firstOrCreate(['name' => 'Sci-Fi']);

        Movie::create([
            'name' => 'The Dark Knight',
            'year' => 2008,
            'genre_id' => $action->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Inception',
            'year' => 2010,
            'genre_id' => $action->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Batman Begins',
            'year' => 2005,
            'genre_id' => $action->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Mad Max: Fury Road',
            'year' => 2015,
            'genre_id' => $action->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Indiana Jones and the Raiders of the Lost Ark',
            'year' => 1981,
            'genre_id' => $adventure->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Jurassic Park',
            'year' => 1993,
            'genre_id' => $adventure->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Tarzan',
            'year' => 2000,
            'genre_id' => $adventure->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Up',
            'year' => 2009,
            'genre_id' => $drama->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'The Shawshank Redemption',
            'year' => 1994,
            'genre_id' => $drama->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Forrest Gump',
            'year' => 1994,
            'genre_id' => $drama->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'The Godfather',
            'year' => 1972,
            'genre_id' => $drama->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Pulp Fiction',
            'year' => 1994,
            'genre_id' => $drama->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Titanic',
            'year' => 1997,
            'genre_id' => $drama->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Toy Story',
            'year' => 1995,
            'genre_id' => $comedy->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Back to the Future',
            'year' => 1985,
            'genre_id' => $comedy->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Finding Nemo',
            'year' => 2003,
            'genre_id' => $comedy->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Groundhog Day',
            'year' => 1993,
            'genre_id' => $comedy->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'The Matrix',
            'year' => 1999,
            'genre_id' => $scifi->id,
            'is_favorite' => false,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Interstellar',
            'year' => 2014,
            'genre_id' => $scifi->id,
            'is_favorite' => true,
            'notes' => null,
        ]);

        Movie::create([
            'name' => 'Avatar',
            'year' => 2009,
            'genre_id' => $scifi->id,
            'is_favorite' => false,
            'notes' => null,
        ]);
    }
}