<!-- resources/views/books/form.blade.php -->
@extends('layouts.view')
@section('content')
<!-- resources/views/books/form.blade.php -->

@if(isset($book))
    {{-- Edit form --}}
    <form action="{{ route('books.update', $book->id) }}" method="POST">
    @method('PUT')
@else
    {{-- Create form --}}
    <form action="{{ route('books.store') }}" method="POST">
@endif
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', isset($book) ? $book->title : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author:</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ old('author', isset($book) ? $book->author : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="isbn" class="form-label">ISBN:</label>
        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', isset($book) ? $book->isbn : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="publish_date" class="form-label">Publish Date:</label>
        <input type="date" class="form-control" id="publish_date" name="publish_date" value="{{ old('publish_date', isset($book) ? $book->publish_date : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="genre" class="form-label">Genre:</label>
        <select class="form-select" id="genre" name="genre" required>
            <option value="">Select Genre</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre', isset($book) ? $book->genre_id : '') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', isset($book) ? $book->quantity : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="available" class="form-label">Available:</label>
        <input type="number" class="form-control" id="available" name="available" value="{{ old('available', isset($book) ? $book->available : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="publisher_id" class="form-label">Publisher:</label>
        <select class="form-select" id="publisher_id" name="publisher_id" required>
            <option value="">Select Publisher</option>
            @foreach($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ old('publisher_id', isset($book) ? $book->publisher_id : '') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection
