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
                    <a class="nav-item nav-link active" href="{{route('dashboard.advert')}}">Advertisements</a>
                    <a class="nav-item nav-link" href="{{route('dashboard.style')}}">Backgrounds</a>
                </div>
            </div>
        </nav>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Vendor</th>
                <th scope="col">Position</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($adverts as $advert)
                <tr>
                    <th scope="row">{{$advert->id}}</th>
                    <td>{{$advert->name}}</td>
                    <td>{{$advert->price}}</td>
                    <td>{{$advert->vendor}}</td>
                    <td>
                        @if($advert->left) left column
                        @elseif ($advert->right) right column
                        @endif
                    </td>
                    <td>
                        <a href="{{route('dashboard.advert.destroy', ['id' => $advert->id])}}"
                           class="btn btn-danger"
                           onclick="alert('You sure')">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="col-sm-4">
            <p>Add new advert:</p>
            <form action="{{route('dashboard.advert.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           id="name"/>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           id="price"/>
                </div>
                <div class="form-group">
                    <label for="vendor">Vendor</label>
                    <input type="text"
                           name="vendor"
                           class="form-control"
                           id="vendor"/>
                </div>
                <div class="form-check">
                    <input class="form-check-input"
                           type="radio" name="position"
                           id="left"
                           value="left">
                    <label class="form-check-label" for="left">
                        Left column
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input"
                           type="radio" name="position"
                           id="right"
                           value="right">
                    <label class="form-check-label" for="right">
                        Right column
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection