<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
        public function store($data){
            $tags = $data['tags'];
            unset($data['tags']);
            $post = Post::create($data);
            // Здесь мы передаем для таблицы которая работает с отношением многие ко многим данные по выбранным id из tags и post id из пост
            // и передает это в функцию tags() которая написана в модели чтобы создать все в таблице PostTags
            $post->tags()->attach($tags);
//        dd($tags, $data);
        }
        public function update($post, $data){
            $tags = $data['tags'];
            unset($data['tags']);
//        dd($data);
            $post->update($data);
            $post->tags()->sync($tags);
        }
}
