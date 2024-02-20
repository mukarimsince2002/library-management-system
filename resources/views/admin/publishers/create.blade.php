<!-- resources/views/publishers/create.blade.php -->

@extends('layouts.view')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Create Publisher</div>

                <div class="card-body">
                    <form action="{{ route('publishers.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
