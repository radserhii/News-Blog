<div class="card">
    <div class="card-header">
        Top news of the day
    </div>
    <div class="card-body">
        @foreach($topNews as $news)
            <a href="{{route('news', ['id' => $news->id])}}">{{$news->title}}</a><span> | </span>
        @endforeach
    </div>
</div>