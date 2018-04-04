@extends('layouts.app')
@section('content')
    <div class="container">
        <ul>
            <h3>All News with tag <b>{{$tag->tag_name}}</b>:</h3>
            @foreach($news as $singeNew)
                <li><a href="{!! route('news', ['id' => $singeNew->id]) !!}">{{$singeNew->title}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection