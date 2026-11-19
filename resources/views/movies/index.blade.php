@extends('movies.layout')

@section('title', 'Movies')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">

    </div>


@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" action="{{ route('movies.index') }}" class="row g-2 mb-4">

    <div class="col-md-4">
        <input type="text" name="search" class="form-control"
               placeholder="Search by name" value="{{ request('search') }}">
    </div>

    <div class="col-md-2">
        <select name="genre" class="form-select">
            <option value="">All genres</option>
            @foreach ($genres as $g)
                <option value="{{ $g->id }}"
                    @selected(request('genre') == $g->id)>{{ $g->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <select name="favorite" class="form-select">
            <option value="">Any</option>
            <option value="1" @selected(request('favorite') === '1')>Favorite</option>
            <option value="0" @selected(request('favorite') === '0')>Not favorite</option>
        </select>
    </div>

    <div class="col-md-2">
        <select name="sort" class="form-select">
            <option value="name" @selected(request('sort', 'name') === 'name')>Sort by name</option>
            <option value="year" @selected(request('sort') === 'year')>Sort by year</option>
        </select>
    </div>

    <div class="col-md-2 d-flex gap-2">
        <button class="btn btn-primary">Apply</button>
        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Clear</a>
    </div>

</form>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Movies</h1>

    @auth
        <a href="{{ route('movies.create') }}" class="btn btn-primary">+ Add Movie</a>
    @endauth
</div>

<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
    </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $movies->firstItem() + $loop->index }}</td>
                    <td><a href="{{ route('movies.show', $movie) }}">{{ $movie->name }}</a></td>
                    <td>{{ $movie->genre->name }}</td>
                    <td>{{ $movie->year }}</td>
                    @auth
                        <td>
                            <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                            <form method="POST" action="{{ route('movies.destroy', $movie) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="{{ auth()->check() ? 5 : 4 }}">No movies found.</td>
                </tr>
            @endforelse
        </tbody>
</table>

<div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-3">

    <div class="text-muted small">
        Showing {{ $movies->firstItem() ?? 0 }} to {{ $movies->lastItem() ?? 0 }} of {{ $movies->total() }} results
    </div>

    <div>
        {{ $movies->links() }}
    </div>

</div>



@endsection