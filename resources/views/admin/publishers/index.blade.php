<!-- resources/views/publishers/view.blade.php -->

@extends('layouts.view')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h2>Publishers List</h2>
            <a href="{{ route('publishers.create') }}" class="btn btn-success mb-3 float--end">Add Publisher</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->phone }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td>
                            <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
