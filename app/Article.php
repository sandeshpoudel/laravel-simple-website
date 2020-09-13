<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // public function getRouteKey() --this function to catch slug from url instead id from the db column to redirect the url
    // {
    //     return 'slug';
    // }

    protected $fillable = ['title', 'excerpt','body'];

    public function path(){
    return route('articles.show', $this);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
