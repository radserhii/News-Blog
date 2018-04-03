@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>{{$category->name}}</h1>
        @foreach ($news as $singleNews)
            <a href="{!! route('news', ['id' => $singleNews->id]) !!}">{{$singleNews->title}}</a><br>
        @endforeach
        {{ $news->links() }}
    </div>
@endsection

{{--<script>--}}
    {{--var category = @json($category);--}}
    {{--console.log(category);--}}
{{--</script>--}}



