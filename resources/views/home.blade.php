@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <img src="{{ asset('img/pic.jpg') }}" width="96" height="96" class="rounded-circle mb-3" alt="Photo of [Your Name]">
        <h5 class="mb-1">Timbal, Greggy F.</h5>
        <p class="text-muted mb-0">BS INFOTECH · 4th year · Block A</p>
    </div>

    <div class="text-center mb-5">
        <h2 class="fw-bold">Keep track of every movie you want to remember</h2>
        <p class="text-muted mb-0">Save the films you've seen or want to watch, and sort them by genre and year.</p>
    </div>

    <div class="row justify-content-center g-3 mb-5">
        <div class="col-6 col-md-3">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="text-muted small">Movies saved</div>
                    <div class="fs-2 fw-semibold">{{ $movieCount }}</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="text-muted small">Genres</div>
                    <div class="fs-2 fw-semibold">{{ $genreCount }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('movies.index') }}" class="btn btn-dark px-4">See all movies</a>
    </div>

</div>
@endsection