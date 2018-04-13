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
                        @if($news->analytic)
                            <p class="text-success">Analytic News</p>
                            @guest
                                <p>{{$news->short_content}}</p>
                                <p class="text-danger">Login or Register for read news</p>
                            @endguest
                            @auth
                                <p>{{$news->content}}</p>
                            @endauth
                        @else
                            <p>{{$news->content}}</p>
                        @endif
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
