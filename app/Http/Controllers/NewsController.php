<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function show($id = null)
    {

        if (!$id){
            $news = News::all();
            return null;
        }

        $news = News::find($id);

        return view('news', ['news' => $news]);
    }
}
