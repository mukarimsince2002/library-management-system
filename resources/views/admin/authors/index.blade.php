@extends('layouts.view')
@section('content')
    <div class="row">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Colours List
                        <a href="{{ route('authors.create') }}" class="btn btn-primary btn-sm float-end">Add author</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>about</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($authors as $author)
                            <tr>
                                <td>{{$author->name}}</td>
                                <td>{{$author->bio}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-3">
                                            <a href="{{route('authors.edit',$author->id)}}" class="btn btn-sm btn-success">Edit</a>
                                        </div>
                                        <div class="col-3">
                                            <form action="{{route('authors.destroy',$author->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure. you want to delete this data?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
