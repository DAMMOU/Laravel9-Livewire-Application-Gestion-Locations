<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprieteArticle extends Model
{
    use HasFactory;

    public function type_article(){
        return $this->belongsTo(TypeArticle::class,'type_article','id');
    }

    public function article(){
        return $this->belongsToMany(Article::class,'article_propriete','article_id','article_propriete_id');
    }
    
}
