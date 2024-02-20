@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Membership</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('memberships.update', $membership->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $membership->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $membership->email }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea class="form-control" id="address" name="address">{{ $membership->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $membership->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="membership_type_id">Membership Type:</label>
                            <select class="form-control" id="membership_type_id" name="membership_type_id">
                                @foreach ($membershipTypes as $membershipType)
                                    <option value="{{ $membershipType->id }}" {{ $membership->membership_type_id == $membershipType->id ? 'selected' : '' }}>{{ $membershipType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
