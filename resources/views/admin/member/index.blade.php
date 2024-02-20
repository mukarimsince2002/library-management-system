@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Memberships</div>

                <div class="card-body">
                    <a href="{{ route('memberships.create') }}" class="btn btn-primary mb-3">Create Membership</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Membership Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberships as $membership)
                            <tr>
                                <td>{{ $membership->name }}</td>
                                <td>{{ $membership->email }}</td>
                                <td>{{ $membership->address }}</td>
                                <td>{{ $membership->phone }}</td>
                                <td>{{ $membership->membershipType->name }}</td>
                                <td>
                                    <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
