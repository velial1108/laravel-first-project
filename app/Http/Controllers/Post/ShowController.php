<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class ShowController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(Post $post)
        {
            $this->authorize('view', $post); // ← вызовет PostPolicy@view
            return view('post.show', compact('post'));
        }
}
