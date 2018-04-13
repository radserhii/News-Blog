@extends('layouts.app')
@section('menu')
@endsection
@section('content')
    <br><br>
    <div class="offset-3 col-sm-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>Create Menus Item:</p>
        <form action="{{route('dashboard.menu.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       name="title"
                       class="form-control"
                       id="title"/>
            </div>
            <div class="form-group">
                <label for="path">Path</label>
                <input type="text"
                       name="path"
                       class="form-control"
                       id="path"/>
            </div>
            <div class="form-group">
                <label for="parent_id">Parent ID</label>
                <input type="number"
                       name="parent_id"
                       class="form-control"
                       id="parent_id"/>
            </div>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection