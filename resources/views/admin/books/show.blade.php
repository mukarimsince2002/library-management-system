<!-- resources/views/books/show.blade.php -->

@extends('layouts.inc.view')

@section('content')
    <div class="container">
        <h1>Book Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title: {{ $book->title }}</h5>
                <p class="card-text">Author: {{ $book->author }}</p>
                <p class="card-text">Publisher: {{ $book->publisher }}</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
            </div>
        </div>
    </div>
@endsection
