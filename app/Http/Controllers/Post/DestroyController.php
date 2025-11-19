<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class DestroyController extends Controller
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(Post $post)
        {
            $post->delete();
            return redirect()->route('post.index');
        }
}
