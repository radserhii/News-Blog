@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div>
                    <img class="mw-100" src="{{$news->image}}" alt="{{$news->title}}">
                </div>
            </div>
            <div class="col-sm-8">
                <h3>{{$news->title}}</h3>
                <p>{{$news->content}}</p>
                <p>Updated: {{$news->updated_at}}</p>
                <div>
                    <p>Tags:</p>
                    @foreach($tags as $tag)
                        <a href="{!! route('news_tag', ['id' => $tag->id]) !!}" class="badge badge-primary">{{$tag->tag_name}}</a>
                    @endforeach
                </div>
                <br>
                {{--React component 'CounterNewsVisitor'--}}
                <div id="counter" data-id="{{$news->id}}"></div>
                {{----}}
            </div>
        </div>
    </div>
@endsection
