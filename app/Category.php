<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the news for the category.
     */
    public function news()
    {
        return $this->hasMany('App\News');
    }
}
