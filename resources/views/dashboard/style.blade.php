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
                    <a class="nav-item nav-link" href="{{route('dashboard.menu')}}">Menu</a>
                    <a class="nav-item nav-link" href="#">Advertisements</a>
                    <a class="nav-item nav-link active" href="{{route('dashboard.style')}}">Backgrounds</a>
                </div>
            </div>
        </nav>
        <div class="offset-4 col-sm-4">
            Choose color:
            <form action="{{route('dashboard.style.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="body">Body:</label>
                    <input type="color" id="body" name="body">
                </div>
                <div class="form-group">
                    <label for="navbar">Navbar:</label>
                    <input type="color" id="navbar" name="navbar">
                </div>
                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection