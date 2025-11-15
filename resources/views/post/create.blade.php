@extends('layouts.main')
@section('content')
    <form action="{{route('post.store')}}" method="post">
       @csrf
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        </div>
    </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content" placeholder="Content"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="text" name="image" class="form-control" id="image" placeholder="Image">
            </div>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
