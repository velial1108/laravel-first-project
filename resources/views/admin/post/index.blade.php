@extends('layouts.admin')
@section('content')
    <div>
        <div>
            <div><a href="{{route('post.create')}}" class="btn btn-primary mb-3">Создать пост</a>
                @foreach($posts as $post)
                    <div><a href="{{route('post.show', $post->id)}}">
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
        </div>
@endsection
