<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index (){

//        $categories = Category::find(1);
//        dd($categories->post);
        $posts = Post::all();
//        dd($post->category);

        return view('post.index', compact('posts'));
    }
    public function store (){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
//        dd($data);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show (Post $post){
      return view('post.show', compact('post'));
    }
    //метод на создание записей в бд
    public function create(){
       return view('post.create');
    }

    public function edit(Post $post)
    {
       return view('post.edit', compact('post'));
    }
// пример обновления данных
    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public  function destroy (Post $post){
        $post -> delete();
        return redirect()->route('post.index');

    }



    //пример удаления данных
    public  function delete (){
        $post = Post::find(2);
        $post->delete();
dd($post);

    }

    public  function restore (){
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restore');
    }
        public  function  firstOrCreate (){
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
        ],[
            'title' => 'another of post from phpstorm',
            'content' => 'some content',
            'image' => 'some imageblabla.jpg',
            'likes' => 50000,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
        }


        public function updateOrCreate (){

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
            ],$anotherPost);
dd ($post->content);
        }
}
