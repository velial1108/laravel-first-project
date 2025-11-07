<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index (){
        //вызов записи с id = 1
//       $post = Post::find(1);
       // вызов всех записей
//       $post = Post::all();
       //вызов коллекции с помощью метода get всегда метод get равно коллекция
//        $posts = Post::where('is_published', 1) -> get();
//        dump($posts);
        //Первая запись выполняющая условие
        $posts = Post::all();
//        foreach ( $posts as $post) {
//            dump($post->title);
//        }
        return view('posts', compact('posts'));
    }
    //метод на создание записей в бд
    public function create(){
        $postsArr = [
            [
            'title' => 'title of post from phpstorm',
            'content' => 'some interesting content',
            'image' => 'imageblabla.jpg',
            'likes' => 20,
            'is_published' => 1,
            ],
            [
            'title' => 'another of post from phpstorm',
            'content' => 'some interesting content',
            'image' => 'imageblabla.jpg',
            'likes' => 20,
            'is_published' => 1,
        ],
          [
                'title' => 'title of post from phpstorm',
                'content' => 'some interesting content',
                'image' => 'imageblabla.jpg',
                'likes' => 50,
                'is_published' => 1,
          ]
        ];
//создать одну запись
//        Post::create([
//            'title' => 'another of post from phpstorm',
//            'content' => 'some interesting content',
//            'image' => 'imageblabla.jpg',
//            'likes' => 20,
//            'is_published' => 1,
//        ]);
//создать много записей
//        foreach ($postsArr as $item){
//            Post::create(
//                $item
//            );
//        }
// по элементам
        foreach ($postsArr as $item){
            Post::create([
                'title' => $item['title'],
                'content' => $item['content'],
                'image' => $item['image'],
                'likes' => $item['likes'],
                'is_published' => $item['is_published'],
            ]);
        }
        dd('created');
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
