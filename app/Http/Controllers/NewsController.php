<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function show($id)
    {

        $news = News::find($id);
        $tags = $news->tags;

        return view('news', ['news' => $news, 'tags' => $tags]);
    }
}
