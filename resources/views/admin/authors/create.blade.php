@extends('layouts.view')
@section('content')

<div class="row">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Colour
                    <a href="{{route('authors.index')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('authors.store')}}" method="POST">
                    @csrf
                    {{-- <div class="row"> --}}
                        <div class="mb-3">
                            <label for="name">Author Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="name"> About Author </label>
                            <textarea type="text" class="form-control" name="bio"></textarea>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    {{-- </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
