<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'image', 'category_id'];

    /**
     * Get the category that owns the news.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
