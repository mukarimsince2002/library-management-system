<!-- resources/views/books/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Book</div>

                <div class="card-body">
                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Author:</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}" required>
                        </div>

                        <!-- Include other fields as needed -->

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
