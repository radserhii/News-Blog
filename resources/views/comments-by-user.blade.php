@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>All comments by <b>{{$user->name}}</b></h1>
        @foreach ($comments as $comment)
            <div>
                {{$comment->created_at}}<span> :: </span>{{$comment->comment}}
            </div>
        @endforeach
        {{ $comments->links() }}
    </div>
@endsection
