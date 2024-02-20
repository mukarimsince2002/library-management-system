@extends('layouts.view')

@section('content')
    <h1>Books</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm float-end">Add Book</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <!-- Add other table headers as needed -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <!-- Add other table data as needed -->
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <!-- Add delete button with form submission -->
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
