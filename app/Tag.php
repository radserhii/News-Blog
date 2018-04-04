<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function news()
    {
        return $this->belongsToMany('App\News', 'news_tags_ref', 'tag_id', 'news_id');
    }
}
