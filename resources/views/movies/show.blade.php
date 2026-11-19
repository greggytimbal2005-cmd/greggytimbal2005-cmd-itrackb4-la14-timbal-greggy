@extends('layouts.app')

@section('title', $movie->name)

@section('content')
<div style="max-width: 600px; margin: 40px auto;">

    <h1 class="h3 mb-1">{{ $movie->name }}</h1>
    <p class="text-muted mb-4">Prepared by: Greggy Timbal</p>

    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%;">Genre</th>
                <td>{{ $movie->genre->name }}</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>{{ $movie->year }}</td>
            </tr>
            <tr>
                <th>Favorite</th>
                <td>{{ $movie->is_favorite ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Notes</th>
                <td>{{ $movie->notes ?? '—' }}</td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex gap-2">
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-outline-primary">Edit</a>

        <form method="POST" action="{{ route('movies.destroy', $movie) }}"
              onsubmit="return confirm('Delete {{ addslashes($movie->name) }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
    </div>

</div>
@endsection