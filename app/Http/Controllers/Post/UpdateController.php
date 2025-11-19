<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class UpdateController extends Controller
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke(Post $post)
        {
            $data = request()->validate([
                'title' => 'string',
                'content' => 'string',
                'image' => 'string',
                'category_id' => '',
                'tags' => '',
            ]);
            $tags = $data['tags'];
            unset($data['tags']);
//        dd($data);
            $post->update($data);
            $post->tags()->sync($tags);
            return redirect()->route('post.show', $post->id);
        }
}
