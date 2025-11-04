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
}
