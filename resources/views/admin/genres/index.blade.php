@extends('layouts.view')

@section('content')
    <div class="container">
        <h1>Genres</h1>

        <!-- Display any validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>List of Genres</h2>

        <ul class="list-group">
            @foreach ($genres as $genre)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $genre->name }}
                    <div>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-sm btn-primary ">Edit</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('genres.create') }}" class="btn btn-success mt-3 float-end" >Create New Genre</a>
    </div>
@endsection
