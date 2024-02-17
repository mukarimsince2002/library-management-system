@extends('layouts.admin')

@section('content')
    <h1>Authors</h1>
    <a href="{{ route('admin.authors.create') }}" class="btn btn-primary">Add Author</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Biography</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->biography }}</td>
                    <td>
                        <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this author?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection