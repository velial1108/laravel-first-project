<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;


class UpdateController extends Controller
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(UpdateRequest $request,Post $post)
        {
            $data = request()->validated();
            $tags = $data['tags'];
            unset($data['tags']);
//        dd($data);
            $post->update($data);
            $post->tags()->sync($tags);
            return redirect()->route('post.show', $post->id);
        }
}
