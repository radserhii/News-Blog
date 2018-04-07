@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="img-fluid float-left" src="{{$news->image}}" alt="{{$news->title}}">
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>{{$news->title}}</h3>
                        <p>{{$news->content}}</p>
                        <p>Updated: {{$news->updated_at}}</p>
                        <div class="row">
                            <div class="col-sm-4">
                                {{--React component 'CounterNewsVisitor'--}}
                                <div id="counter" data-id="{{$news->id}}"></div>
                                {{----}}
                            </div>
                            <div class="col-sm-8">
                                <p><b>Tags: </b>
                                    @foreach($tags as $tag)
                                        <a href="{!! route('news_tag', ['id' => $tag->id]) !!}"
                                           class="badge badge-primary">{{$tag->tag_name}}</a>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.comments')
    </div>
@endsection
