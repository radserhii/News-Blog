
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{$allNews[0]->image}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="{!! route('news', ['id' => $allNews[0]->id]) !!}">{{$allNews[0]->title}}</a></h5>
            </div>
        </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="{{$allNews[1]->image}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <a href="{!! route('news', ['id' => $allNews[1]->id]) !!}">{{$allNews[1]->title}}</a>
            </div>
        </div>

        <div class="carousel-item">
            <img class="d-block w-100" src="{{$allNews[2]->image}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="{!! route('news', ['id' => $allNews[2]->id]) !!}">{{$allNews[2]->title}}</a></h5>
            </div>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>