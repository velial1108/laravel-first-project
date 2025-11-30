<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\BaseController;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;


class IndexController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(FilterRequest $request)
        {
            $this->authorize('admin');
            $data = $request->validated();
            $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
            $posts = Post::filter($filter)->paginate(10);
//            dd($posts->items()); // или просто dd($posts);
            return view('admin.post.index', compact('posts'));
        }
}
