<div class="comments">
    <br>
    <h4>Comments</h4>
    @auth
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('comment_create', ['newsId' => $news->id]) }}" method="post">
            @csrf
            <div class="form-group">
                <textarea class="form-control" name="comment" rows="3"></textarea>
                <button type="submit" class="btn btn-primary">Post comment</button>
            </div>
        </form>
    @else
        <p class="text-danger">You can post comments after logging in</p>
    @endauth
    {{--React component Comments?--}}
    <div id="comments" data-id={{$news->id}}></div>
    {{----}}
</div>