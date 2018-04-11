<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class IndexController extends Controller
{
    public function index()
    {
//        get categories with own news
        $categories = Category::with(['news' => function ($query) {
            $query->orderBy('updated_at', 'desc');
        }])->get();

//        get all latest news
        $allNews = News::orderBy('updated_at', 'desc')->get();

//        get top 5 commentators
        $comments_user = Comment::select('user_id')
            ->groupBy('user_id')
            ->orderBy(DB::raw('COUNT(user_id)'), 'desc')
            ->limit(5)
            ->get();;

        $topUsersId = [];
        foreach ($comments_user as $key => $comment) {
            $topUsersId[$key] = $comment->user_id;
        }

        $topUsers = User::whereIn('id', $topUsersId)->get();

//get top 3 commented news of the day

        $lastDay = Carbon::now()->subDay();

        $comments_news = Comment::select('news_id')
            ->where('created_at', '>=', $lastDay)
            ->groupBy('news_id')
            ->orderBy(DB::raw('COUNT(news_id)'), 'desc')
            ->limit(3)
            ->get();;

        $topNewsId = [];
        foreach ($comments_news as $key => $comment) {
            $topNewsId[$key] = $comment->news_id;
        }

        $topNews = News::whereIn('id', $topNewsId)->get();

        return view('index', [
            'categories' => $categories,
            'allNews' => $allNews,
            'topUsers' => $topUsers,
            'topNews' => $topNews
        ]);
    }
}
