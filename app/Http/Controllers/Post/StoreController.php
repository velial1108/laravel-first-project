<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class StoreController extends Controller
{
    //если в роуте произойдет вызов этого класса то самый первый запустится invoke
        public function __invoke()
        {
            $data = request()->validate([
                'title' => 'required | string',
                'content' => 'string',
                'image' => 'string',
                'category_id' => '',
                'tags' => '',
            ]);
            $tags = $data['tags'];
            unset($data['tags']);

            $post = Post::create($data);
            // Здесь мы передаем для таблицы которая работает с отношением многие ко многим данные по выбранным id из tags и post id из пост
            // и передает это в функцию tags() которая написана в модели чтобы создать все в таблице PostTags
            $post->tags()->attach($tags);
//        dd($tags, $data);

            return redirect()->route('post.index');
        }
}
