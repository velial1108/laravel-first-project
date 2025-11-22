<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class IndexController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke()
        {
            $posts = Post::paginate(10);
            return view('post.index', compact('posts'));
        }
}
