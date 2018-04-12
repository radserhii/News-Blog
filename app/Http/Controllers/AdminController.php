<?php

namespace App\Http\Controllers;

use Couchbase\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;

class AdminController extends Controller
{
    public function indexCat()
    {

        $categories = Category::all();
        return view('dashboard.index', ['categories' => $categories]);
    }

    public function storeCat(Request $request)
    {
        $category = new Category;
        $category->create($request->all());
        return Redirect::to('admin');
    }

    public function editCat($id)
    {
        $category = Category::find($id);
        return view('dashboard.category-edit', ['category' => $category]);
    }

    public function updateCat(Request $request, $id)
    {
        Category::find($id)->update($request->all());
        return Redirect::to('admin');
    }

    public function destroyCat($id)
    {
        $category = Category::find($id);
        $category->delete();
        return Redirect::to('admin');
    }
}
