<?php

namespace App\Http\Controllers;

use Couchbase\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\News;
use App\Tag;
use Illuminate\Support\Facades\DB;
use App\Menu;
use App\Advert;
use App\Comment;

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

//    Menu CRUD

    public function indexMenu()
    {
        $AllMenu = Menu::all();
        return view('dashboard.menu', ['AllMenu' => $AllMenu]);
    }

    public function createMenu()
    {
        return view('dashboard.menu-create');
    }

    public function storeMenu(Request $request)
    {
        Menu::create($request->all());
        return redirect()->route('dashboard.menu');
    }

    public function destroyMenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('dashboard.menu');
    }

//    Advert CRUD

    public function indexAdvert()
    {
        $adverts = Advert::all();
        return view('dashboard.advert', ['adverts' => $adverts]);
    }

    public function storeAdvert(Request $request)
    {
        $advert = new Advert;
        $advert->name = $request->name;
        $advert->price = $request->price;
        $advert->vendor = $request->vendor;
        if ($request->position === "left") {
            $advert->left = 1;
        }
        if ($request->position === "right") {
            $advert->right = 1;
        }
        $advert->save();
        return redirect()->route('dashboard.advert');
    }

    public function destroyAdvert($id)
    {
        $menu = Advert::find($id);
        $menu->delete();
        return redirect()->route('dashboard.advert');
    }

//    Comments CRUD
    public function indexComment()
    {
        $comments = Comment::all();
        return view('dashboard.comment', ['comments' => $comments]);
    }

}
