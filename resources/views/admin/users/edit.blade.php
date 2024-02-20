<!-- resources/views/users/edit.blade.php -->

@extends('layouts.view')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
            </div>

            <div class="form-group">
                <label for="current_photo">Current Photo</label><br>
                @if($user->profile_photo_path)
{{--
                    {{$imagePath='uploads/'.'user_photos'.'/'.;}} --}}
                    <img src="{{ asset($user->profile_photo_path) }}" alt="Uploaded Image" style="max-width: 200px; max-height: 200px;">
                @else
                    <p>No photo available</p>
                @endif
            </div>

            <div class="form-group">
                <label for="photo">New Photo</label>
                <input type="file" class="form-control-file" id="photo" name="profile_photo_path">
            </div>
            <br/>
            <div>
                <button type="submit" class="btn btn-primary">Update User</button>
            </div>
        </form>
    </div>
@endsection
