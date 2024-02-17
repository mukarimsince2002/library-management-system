@extends('layouts.view')
@section('çontent')
<h1>Genres</h1>
    <!-- Display any validation errors -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2>List of Genres</h2>
    <!-- Display a list of existing genres here -->
    <ul>
        @foreach ($genres as $genre)
            <li>{{ $genre->name }}</li>
        @endforeach
    </ul>

@endsection
