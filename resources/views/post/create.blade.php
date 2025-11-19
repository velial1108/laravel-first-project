@extends('layouts.main')
@section('content')
    <form action="{{route('post.store')}}" method="post">
       @csrf
    <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
{{--            value прописан на случай если что то дальше будет провалидировано не правильно чтобы верное значение оставалось--}}
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{old('title')}}">
{{--            //Проверка через контроллер на заполенение и правильный тип или что задашь--}}
           @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
{{--                Случай с textarea--}}
                <textarea class="form-control" name="content" id="content" placeholder="Content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{old('image')}}" >
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                @foreach($categories as $category)
{{--Та же история но только для внешних ключей один к одному в строке select--}}
                <option {{old('category_id') == $category->id ? 'selected' : ''}}
                    value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)

                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
