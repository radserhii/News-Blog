<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id);
        $news = News::where('category_id', $id)->paginate(5);
        return view('category', ['category' => $category, 'news' => $news]);
    }
}
