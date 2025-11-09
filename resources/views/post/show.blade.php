@extends('layouts.main')
@section('content')
<div>

        <div>
            {{$post->id}}.
            {{$post->title}}
            ||
            {{$post->content}}
        </div>
    <div>
        <a href="{{route('post.edit', $post->id)}}">Edit</a>
    </div>
    <div>
        <form action="{{route('post.delete', $post->id)}}" method="post">
            @csrf
            @method('delete')
        <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
    <div>
        <a href="{{route('post.index')}}">Back</a>
    </div>
</div>
@endsection
