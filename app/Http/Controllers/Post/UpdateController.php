<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;


class UpdateController extends BaseController
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(UpdateRequest $request,Post $post)
        {
            //НЕ ЗАБЫТЬ ПОМЕНЯТЬ requst на $request
            $data = $request->validated();

            //передаем параметры которые получаем по $post и результат валидации $data
            $post=$this->service->update($post, $data);
            return $post instanceof Post ? new PostResource($post): $post;
//            return new PostResource($post);
//            return redirect()->route('post.show', $post->id);
        }
}
