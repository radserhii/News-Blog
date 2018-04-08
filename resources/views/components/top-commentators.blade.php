<div class="card">
    <div class="card-header">
        Top commentators
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <a href="{{route('comments_by_user', ['id' => $user->id])}}">{{$user->name}}</a><span> | </span>
        @endforeach
    </div>
</div>