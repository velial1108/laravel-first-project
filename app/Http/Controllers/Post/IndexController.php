<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;


class IndexController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(FilterRequest $request)
        {
            $data = $request->validated();
            $page = $data['page'] ?? 1;
            $perPage = $data['perPage'] ?? 10;
            $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

            // Начинаем с базового запроса
            $query = Post::query();

            // Проверяем: если пользователь НЕ админ (или не залогинен) — фильтруем только опубликованные
            if (! auth()->check() || auth()->user()->role !== 'admin') {
                $query->where('is_published', 1);
            }

            // Применяем ваш фильтр (категория, поиск и т.д.)
            $posts = $query->filter($filter)->paginate($perPage, ['*'], 'page', $page);
            return PostResource::collection($posts);
//            return view('post.index', compact('posts'));
        }
}
