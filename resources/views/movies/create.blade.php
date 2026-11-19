@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')
<div style="max-width: 500px; margin: 40px auto;">

    <h1 class="h3 mb-4">Add Movie</h1>

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre_id" class="form-select">
                <option value="">Choose a genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Year</label>
            <input type="number" name="year" class="form-control" value="{{ old('year') }}">
            @error('year') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="form-check mb-3">
            <input type="hidden" name="is_favorite" value="0">
            <input type="checkbox" name="is_favorite" value="1" class="form-check-input" id="is_favorite"
                @checked(old('is_favorite'))>
            <label class="form-check-label" for="is_favorite">Favorite</label>
        </div>

        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
            @error('notes') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </form>

</div>
@endsection