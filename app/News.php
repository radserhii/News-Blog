<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'image', 'category_id', 'count_views'];

    /**
     * Get the category that owns the news.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'news_tags_ref', 'news_id', 'tag_id');
    }
}
