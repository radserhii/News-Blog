@extends('layouts.app')
@section('content')
    @include('components.slider')
    <div class="container">
        @foreach ($categories as $category)
            <div class="card float-left" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title"><b><a href="{!! route('category', ['id' => $category->id]) !!}">{{$category->name}}</a></b></h3>
                    <hr>
                    @foreach ($category->news as $news)
                        @if($loop->iteration <= 5)
                            <h5 class="card-text"><a href="{!! route('news', ['id' => $news->id]) !!}">{{$news->title}}</a></h5>
                            <p>Updated: {{$news->updated_at}}</p>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection


