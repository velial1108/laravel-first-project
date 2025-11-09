<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index (){
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
    //метод на создание записей в бд
    public function create(){
       return view('post.create');
    }
// пример обновления данных
    public function update()
    {
        $post = Post::find(6);
        $post->update([
        'title' => 'updated',
        'content' => 'update',
        'image' => 'update',
        'likes' => 1000,
        'is_published' => 0,
        ]);
        dd('update');
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
