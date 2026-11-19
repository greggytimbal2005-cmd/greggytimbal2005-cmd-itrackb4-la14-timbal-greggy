@extends('layouts.app')

@section('content')
    <h1>Page not found</h1>

    <p>Sorry, the page you are looking for does not exist or may have been moved.</p>

    <a href="{{ route('movies.index') }}">Back to the list</a>
@endsection