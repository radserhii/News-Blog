@extends('layouts.app')
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
                    <a class="nav-item nav-link active" href="{{route('dashboard.news')}}">News</a>
                    <a class="nav-item nav-link" href="#">Comments</a>
                    <a class="nav-item nav-link" href="#">Menu</a>
                    <a class="nav-item nav-link" href="#">Advertisements</a>
                    <a class="nav-item nav-link" href="#">Backgrounds</a>
                </div>
            </div>
        </nav>

        <a href="{{route('dashboard.news.create')}}" class="btn btn-warning">Add news</a>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Path Image</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Analytic</th>
                <th scope="col">Counter Views</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($allNews as $news)
                <tr>
                    <th scope="row">{{$news->id}}</th>
                    <td>{{$news->title}}</td>
                    <td>{{$news->short_content}}</td>
                    <td>{{$news->image}}</td>
                    <td>{{$news->category->name}}</td>
                    <td>
                        @foreach ($news->tags as $tag)
                            <span class="badge badge-primary">{{$tag->tag_name}}</span>
                        @endforeach
                    </td>
                    <td>{{$news->analytic}}</td>
                    <td>
                        @if(!$news->count_views) 0
                        @else {{$news->count_views}}
                        @endif
                    </td>
                    <td>{{$news->created_at}}</td>
                    <td>{{$news->updated_at}}</td>
                    <td>
                        <a href="{{route('dashboard.news.destroy', ['id' => $news->id])}}"
                           class="btn btn-danger"
                        onclick="alert('You sure')">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $allNews->links() }}
    </div>
@endsection