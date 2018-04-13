<?php

namespace App\Http\Controllers;

use Couchbase\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\News;
use App\Tag;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
//    Category CRUD
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

//    News CRUD

    public function indexNews()
    {
        $news = News::with('category', 'tags')->orderBy('created_at', 'DESC')->paginate(5);
        return view('dashboard.news', ['allNews' => $news]);
    }

    public function createNews()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.news-create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function storeNews(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ]);

        $news = new News;
        $news->title = $request->title;
        $news->content = $request->text;
        $news->category_id = $request->category_id;
        $news->analytic = ($request->analytic === "on") ? 1 : null;
        $news->image = $this->saveImage($request);
        $news->save();

        $newsId = $news->id;
        $tagsArray = $request->tags;
        foreach ($tagsArray as $tagId) {
            DB::table('news_tags_ref')->insert(
                ['news_id' => $newsId, 'tag_id' => $tagId]
            );
        }

        return redirect()->route('dashboard.news');
    }

    public function destroyNews($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->route('dashboard.news');
    }

    private function saveImage($request)
    {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalName();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);
        return '/images/' . $imageName;
    }
}
