<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function type_article(){
       return $this->belongsTo(TypeArticle::class,'type_article','id');
    }
}
