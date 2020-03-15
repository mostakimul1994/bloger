<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    Protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'details',
        'image',
        'is_featured',
        'is_trending',
        'is_editors_pick',
        'status',
        'total_read',
    ];
        public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
}
