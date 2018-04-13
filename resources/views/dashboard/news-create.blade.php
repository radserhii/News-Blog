@extends('layouts.app')
@section('menu')
@endsection
@section('content')
    <br><br>
    <div class="offset-2 col-sm-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <p>Create News:</p>
        <form action="{{route('dashboard.news.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               id="title"/>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value={{$category->id}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"
                               name="image"
                               class="form-control"
                               id="image"/>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select class="form-control" name="tags[]" id="tags" multiple>
                            @foreach($tags as $tag)
                                <option value={{$tag->id}}>{{$tag->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="analytic" class="form-check-input" id="analytic">
                        <label class="form-check-label" for="analytic">Analytic</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="text"
                          class="form-control"
                          rows="8"
                          id="content"></textarea>

            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection