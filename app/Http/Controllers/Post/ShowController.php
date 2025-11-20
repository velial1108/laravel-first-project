<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class ShowController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(Post $post)
        {
            return view('post.show', compact('post'));
        }
}
