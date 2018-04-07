<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\News;

class TagController extends Controller
{
    public function showNewsWithTag($id)
    {
        $tag = Tag::find($id);
        $news = $tag->news()->paginate(5);
        return view('news-with-tag', ['tag' => $tag, 'news' => $news]);
    }

    public function showNewsWithTagName($name)
    {
        $tag = Tag::where('tag_name', $name)->firstOrFail();
        $tagId = $tag->id;
        return $this->showNewsWithTag($tagId);
    }
}
