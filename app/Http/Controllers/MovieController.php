<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::with('genre');

        $search = $request->query('search');
        if ($search) {
            $query = $query->where('name', 'like', "%{$search}%");
        }

        $genre = $request->query('genre');
        if ($genre !== null && $genre !== '') {
            $query = $query->where('genre_id', $genre);
        }

        $favorite = $request->query('favorite');
        if ($favorite !== null && $favorite !== '') {
            $query = $query->where('is_favorite', $favorite);
        }

        $sort = $request->query('sort', 'name');
        if (! in_array($sort, ['name', 'year'])) {
            $sort = 'name';
        }

        $movies = $query->orderBy($sort)->paginate(5)->withQueryString();

        $genres = Genre::all();

        return view('movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();

        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'genre_id'    => 'required|exists:genres,id',
            'year'        => 'nullable|integer',
            'is_favorite' => 'required|boolean',
            'notes'       => 'nullable|string',
        ]);

        $movie = Movie::create($validated);

        Log::info('Successfully created', [
            'id' => $movie->id,
        ]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie added.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();

        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'genre_id'    => 'required|exists:genres,id',
            'year'        => 'nullable|integer',
            'is_favorite' => 'required|boolean',
            'notes'       => 'nullable|string',
        ]);

        $movie->update($validated);

        Log::info('Successfully updated', [
            'id' => $movie->id,
        ]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie updated.');
    }

    public function destroy(Movie $movie)
    {
        abort_if($movie->genre->movies()->count() === 1, 403);

        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted.');
    }
}