@extends('layouts.app')
@section('menu')
@endsection
@section('content')
    <div class="container">
        <div class="offset-4 col-sm-4">
            <form action="{{route('dashboard.category.update', ['id' => $category->id])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="first_name">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           id="first_name"
                           value="{{$category->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection