<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;


class CreateController extends Controller
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke()
        {
            $categories = Category::all();
            $tags = Tag::all();
            return view('post.create', compact('categories', 'tags'));
        }
}
