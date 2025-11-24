<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;


class IndexController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(FilterRequest $request)
        {
            $data = $request->validated();
            $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);


            //Так не делают просто пример фильтра через строку поиска
//            $query = Post::query();
//            if (isset($data['category_id'])) {
//                $query->where('category_id', $data['category_id']);
//            }
//            if (isset($data['content'])) {
//                $query->where('content', 'Like',"%{$data['content']}%");
//            }
//            $post = $query->get();
//            dd($post);
            $posts = Post::filter($filter)->paginate(10);
//            dd($posts->items()); // или просто dd($posts);
            return view('post.index', compact('posts'));
        }
}
