@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Category</a>
                    <a class="nav-item nav-link" href="#">News</a>
                    <a class="nav-item nav-link" href="#">Comments</a>
                    <a class="nav-item nav-link" href="#">Menu</a>
                    <a class="nav-item nav-link" href="#">Advertisements</a>
                    <a class="nav-item nav-link" href="#">Backgrounds</a>
                </div>
            </div>
        </nav>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <a href="{{route('dashboard.category.edit', ['id' => $category->id])}}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{route('dashboard.category.destroy', ['id' => $category->id])}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="col-sm-4">
            <p>Add new category:</p>
            <form action="{{route('dashboard.category.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="first_name">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           id="first_name"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection