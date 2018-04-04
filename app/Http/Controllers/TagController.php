<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function showNewsWithTag($id)
    {
        $tag = Tag::find($id);
        $news = $tag->news;
        return view('news-with-tag', ['tag' => $tag, 'news' => $news]);
    }
}
