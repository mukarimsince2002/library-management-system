@extends('layouts.view')
@section('content')

<div class="row">
    @if (session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Colour
                    <a href="{{route('authors.index')}}" class="btn btn-primary text-white btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('authors.update',$author->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- <div class="row"> --}}
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$author->name}}"/>
                        </div>
                        <div class="mb-3">
                            <label for="code">About Authors</label>
                            <input type="text" class="form-control" name="bio" value="{{$author->bio}}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    {{-- </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
