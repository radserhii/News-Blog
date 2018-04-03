<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;

class CategoryController extends Controller
{
    public  function index()
    {
//        get categories with own news
        $categories = Category::with(['news' => function ($query) {
            $query->orderBy('updated_at', 'desc');
        }])->get();

//        get all latest news
        $allNews = News::orderBy('updated_at', 'desc')->get();

//        get one latest news
        $firstNews = $allNews[0];

        return view('index', ['categories' => $categories, 'allNews' => $allNews, 'firstNews' => $firstNews]);
    }

    public function show($id)
    {
        $category = Category::find($id);
        $news = News::where('category_id', $id)->paginate(5);
        return view('category', ['category' => $category, 'news' => $news]);
    }
}
