@extends('layouts.app')
@section('menu')
@endsection
@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="{{route('admin.dashboard')}}">Category</a>
                    <a class="nav-item nav-link" href="{{route('dashboard.news')}}">News</a>
                    <a class="nav-item nav-link" href="#">Comments</a>
                    <a class="nav-item nav-link active" href="{{route('dashboard.menu')}}">Menu</a>
                    <a class="nav-item nav-link" href="#">Advertisements</a>
                    <a class="nav-item nav-link" href="#">Backgrounds</a>
                </div>
            </div>
        </nav>

        <a href="{{route('dashboard.menu.create')}}" class="btn btn-warning">Add item</a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Path</th>
                <th scope="col">Parent ID</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($AllMenu as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->path}}</td>
                    <td>{{$item->parent_id}}</td>
                    <td>
                        <a href="{{route('dashboard.menu.destroy', ['id' => $item->id])}}"
                           class="btn btn-danger"
                           onclick="alert('You sure')">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection