@extends('layouts.app')
@section('content')
    <div class="container">
        @include('components.slider')
        <div class="row _row">
            <div class="col-sm-6">
                @include('components.top-commentators')
            </div>
            <div class="col-sm-6">
                @include('components.top-news')
            </div>
        </div>
        <div class="_row"></div>
        @foreach ($categories as $category)
            <div class="card float-left col-sm-4">
                <div class="card-body">
                    <h3 class="card-title"><b><a
                                    href="{!! route('category', ['id' => $category->id]) !!}">{{$category->name}}</a></b>
                    </h3>
                    <hr>
                    @foreach ($category->news as $news)
                        @if($loop->iteration <= 5)
                            <h5 class="card-text"><a
                                        href="{!! route('news', ['id' => $news->id]) !!}">{{$news->title}}</a></h5>
                            <p>Updated: {{$news->updated_at}}</p>
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection


