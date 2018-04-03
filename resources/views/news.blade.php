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
                <div id="counter" data-title="{{$news->title}}"></div>
            </div>
        </div>
    </div>
@endsection
