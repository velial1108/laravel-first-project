<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends model
{

    use HasFactory;
    use SoftDeletes;
    //определяем нашу таблицу
   protected $table = 'posts';
   //разрешает модели изменение атрибутов всех
   protected $guarded = [];
   //разрешить модели изменять некоторые значения атрибутов
//   protected $fillable = ['title','content'];
    function category(){
        return $this->belongsTo(Category::class);
    }
}
