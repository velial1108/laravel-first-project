<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required | string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);
        // Здесь мы передаем для таблицы которая работает с отношением многие ко многим данные по выбранным id из tags и post id из пост
        // и передает это в функцию tags() которая написана в модели чтобы создать все в таблице PostTags
      $post->tags()->attach($tags);
//        dd($tags, $data);


        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    //метод на создание записей в бд
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

// пример обновления данных
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
//        dd($data);
        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');

    }


    //пример удаления данных
    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd($post);

    }

    public function restore()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restore');
    }

    public function firstOrCreate()
    {
//        $post = Post::find(1);
        $anotherPost =
            [
                'title' => 'some post',
                'content' => 'some content',
                'image' => 'some imageblabla.jpg',
                'likes' => 50000,
                'is_published' => 1,
            ];
        $post = Post::firstOrCreate([
            'title' => 'another of post from phpstorm',
        ], [
            'title' => 'another of post from phpstorm',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }


    public function updateOrCreate()
    {

        $anotherPost =
            [
                'title' => 'updateorcreate some post',
                'content' => 'updateorcreate some content',
                'image' => 'updateorcreate some imageblabla.jpg',
                'likes' => 500,
                'is_published' => 0,
            ];
        $post = Post::updateOrCreate([
            'title' => 'title of post from phpstorm',
        ], $anotherPost);
        dd($post->content);
    }
}
