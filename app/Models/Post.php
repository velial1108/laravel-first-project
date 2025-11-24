<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends model
{

    use HasFactory;
    use SoftDeletes;
    use Filterable;
    //определяем нашу таблицу
   protected $table = 'posts';
   //разрешает модели изменение атрибутов всех
   protected $guarded = [];
   //разрешить модели изменять некоторые значения атрибутов

    function category(){
        return $this->belongsTo(Category::class);
    }
    //Урок отношения многие ко многим
    //создаем отношение внутри модели для постов значит
//    table: название промежуточной таблицы где будет соед многие ко многим post_tags
// первый оргумент внешний ключ от нашего Post внутри таблицы post_tags  и вторым аргументом внешний ключ связываемой таблицы tags то есть tag_id
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
