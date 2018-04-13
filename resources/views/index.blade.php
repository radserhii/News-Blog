@extends('layouts.app')
@section('menu')
    @parent
@endsection
@section('content')
    <div class="container">
        @include('components.slider')
        <div class="row _row">
            <div class="col-sm-2">
                @foreach($advertsLeft as $advert)
                    <div class="card _card">
                        <div class="card-body">
                            <h3 class="card-title">{{$advert->name}}</h3>
                            <h5 class="card-subtitle mb-2 text-muted">Price: <span class="_price">{{$advert->price}} $</span></h5>
                            <p> Vendor: {{$advert->vendor}}</p>
                        </div>
                        <div class="_discount">
                            <p>Купон на скидку <span style="color: red">YUOLJGDRRDRRT</span> примените и получите скидку 10%</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-8">
                {{--React component SearchFilter--}}
                <div id="search-filter"></div>
                {{----}}
                <div class="row _row">
                    <div class="col-sm-6">
                        @include('components.top-commentators')
                    </div>
                    <div class="col-sm-6">
                        @include('components.top-news')
                    </div>
                </div>
                <div class="_row"></div>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="card float-left col-sm-4">
                            <div class="card-body">
                                <h3 class="card-title"><b><a
                                                href="{!! route('category', ['id' => $category->id]) !!}">{{$category->name}}</a></b>
                                </h3>
                                <hr>
                                @foreach ($category->news as $news)
                                    @if($loop->iteration <= 5)
                                        <h5 class="card-text">
                                            <a href="{!! route('news', ['id' => $news->id]) !!}">{{$news->title}}</a>
                                        </h5>
                                        <p>Updated: {{$news->updated_at}}</p>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @if($loop->iteration % 3 === 0)
                </div>
                <div class="row">
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-2">
                @foreach($advertsRight as $advert)
                    <div class="card _card">
                        <div class="card-body">
                            <h3 class="card-title">{{$advert->name}}</h3>
                            <h5 class="card-subtitle mb-2 text-muted">Price: <span class="_price">{{$advert->price}} $</span></h5>
                            <a href="#" class="card-link"> {{$advert->vendor}}</a>
                        </div>
                        <div class="_discount">
                            <p>Купон на скидку <span style="color: red">YUOLJGDRRDRRT</span> примените и получите скидку 10%</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


