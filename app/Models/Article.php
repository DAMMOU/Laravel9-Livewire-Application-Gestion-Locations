<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    
    public function type_articles(){
       return $this->belongsTo(TypeArticle::class,'type_article','id');
    }

    public function tarification(){
        return $this->hasMany(Tarification::class);
     }

     public function locations(){
        return $this->belongsToMany(Location::class,'article_location','article_id','location_id');
     }

     public function proprietes(){
      return $this->belongsToMany(ProprieteArticle::class,'article_propriete','article_propriete_id','article_id');
  }
}
