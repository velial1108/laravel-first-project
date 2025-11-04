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
        $posts = Post::where('is_published', 1) -> first();
//        foreach ( $posts as $post) {
//            dump($post->title);
//        }
//       dd($post);
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
}
