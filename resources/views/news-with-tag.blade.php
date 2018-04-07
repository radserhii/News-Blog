@extends('layouts.app')
@section('content')
    <div class="container">
            <h3>All News with tag <b>{{$tag->tag_name}}</b>:</h3>
            @foreach($news as $singeNew)
                <p><a href="{!! route('news', ['id' => $singeNew->id]) !!}">{{$singeNew->title}}</a></p>
            @endforeach
        {{ $news->links() }}
    </div>
@endsection