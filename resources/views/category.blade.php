@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>{{$category->name}}</h1>
        @foreach ($news as $singleNews)
            <p><a href="{!! route('news', ['id' => $singleNews->id]) !!}">{{$singleNews->title}}</a><p>
        @endforeach
        {{ $news->links() }}
    </div>
@endsection



