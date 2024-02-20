@extends('layouts.view')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Membership Types</div>

                <div class="card-body">
                    <a href="{{ route('membership_type.create') }}" class="btn btn-primary mb-3">Create Membership Type</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Duration</th>
                                <th>Fee</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($membershipTypes as $membershipType)
                            <tr>
                                <td>{{ $membershipType->name }}</td>
                                <td>{{ $membershipType->description }}</td>
                                <td>{{ $membershipType->duration }}</td>
                                <td>{{ $membershipType->fee }}</td>
                                <td>
                                    <a href="{{ route('membership_type.edit', $membershipType->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <!-- Add delete functionality here -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
