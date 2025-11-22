@extends('layouts.main')
@section('content')
<div class="me-6">
    <div><a href="{{route('post.create')}}" class="btn btn-primary mb-3">Создать пост</a>
    @foreach($posts as $post)
        <div class="me-6"> <a href="{{route('post.show', $post->id)}}">
            {{$post->id}}.
            {{$post->title}}
            ||
            {{$post->content}}
        </a>
        </div>
    @endforeach
</div>
    <br>
    <div class="mt-3">
        {{$posts->links()}}
    </div>
@endsection
