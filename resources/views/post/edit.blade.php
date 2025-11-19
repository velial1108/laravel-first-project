@extends('layouts.main')
@section('content')
    <form action="{{route('post.update', $post->id)}}" method="post">
       @csrf
        @method('patch')
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$post->title}}">
        </div>
    </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content" placeholder="Content" >{{$post->content}}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{$post->image}}">
            </div>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected($category->id == $post->category_id)>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                     @foreach($post->tags as $PostTag)
                         @selected($tag->id === $PostTag->id)
                      @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
