@extends('layouts.view')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Membership Type</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('membership_type.update', $membershipType->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $membershipType->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description">{{ $membershipType->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration:</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ $membershipType->duration }}">
                        </div>
                        <div class="form-group">
                            <label for="fee">Fee:</label>
                            <input type="text" class="form-control" id="fee" name="fee" value="{{ $membershipType->fee }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
