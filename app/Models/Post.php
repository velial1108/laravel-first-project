<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
   protected $table = 'posts';
   //разрешает модели изменение атрибутов всех
   protected $guarded = [];
   //разрешить модели изменять некоторые значения атрибутов
//   protected $fillable = ['title','content'];
}
