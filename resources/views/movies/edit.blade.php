@extends('layouts.app')

@section('content')
<div style="max-width: 500px; margin: 40px auto; padding: 0 20px;">

    <h1>Edit Movie</h1>

    <form method="POST" action="{{ route('movies.update', $movie) }}">
        @csrf
        @method('PUT')

        <p>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name', $movie->name) }}">
            @error('name') <span style="color:red;">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Genre</label><br>
            <select name="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}"
                        @selected(old('genre_id', $movie->genre_id) == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id') <span style="color:red;">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Year</label><br>
            <input type="number" name="year" value="{{ old('year', $movie->year) }}">
            @error('year') <span style="color:red;">{{ $message }}</span> @enderror
        </p>

        <p>
            <input type="hidden" name="is_favorite" value="0">
            <input type="checkbox" name="is_favorite" value="1"
                @checked(old('is_favorite', $movie->is_favorite))>
            <label>Favorite</label>
        </p>

        <p>
            <label>Notes</label><br>
            <textarea name="notes">{{ old('notes', $movie->notes) }}</textarea>
            @error('notes') <span style="color:red;">{{ $message }}</span> @enderror
        </p>

        <button type="submit">Update</button>
    </form>

    <p><a href="{{ route('movies.index') }}">Back to the list</a></p>

</div>
@endsection