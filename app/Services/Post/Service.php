<?php

namespace App\Services\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Support\Facades\DB;


class Service
{
    public function store($data)
    {
        try {
            Db::BeginTransaction();
            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);
            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);
            $post = Post::create($data);
            // Здесь мы передаем для таблицы которая работает с отношением многие ко многим данные по выбранным id из tags и post id из пост
            // и передает это в функцию tags() которая написана в модели чтобы создать все в таблице PostTags
            $post->tags()->attach($tagIds);
            Db::commit();
        } catch (Exception $exception){
            Db::rollBack();
            return $exception->getMessage();
        }

        return $post;
    }

    public function update($post, $data)
    {
        try {
            Db::BeginTransaction();
        $tags = $data['tags'];
        $category = $data['category'];
        unset($data['tags'], $data['category']);

        $tagIds = $this->getTagIdsWithUpdate($tags);
        $data['category_id'] = $this->getCategoryIdWithUpdate($category);
//        dd($data);
        $post->update($data);
        $post->tags()->sync($tagIds);
        $post = $post->fresh();
            Db::commit();
        } catch (Exception $exception) {
            Db::rollBack();
            return $exception->getMessage();
        }
        return $post->fresh();
    }
    private function getCategoryId($item)
    {
        $category = !isset($item['id'])? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }
    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create([$tag]) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    private function getTagIdsWithUpdate($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if(!isset($tag['id'])){
                $tag = Tag::create($tag);
            } else {
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag= $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }
    private function getCategoryIdWithUpdate($item)
    {
        if(!isset($item['id'])){
            $category = Category::create($item);
        } else {
           $category = Category::find($item['id']);
           $category->update($item);
           $category = $category->fresh();
        }
        return $category->id;
    }
}
